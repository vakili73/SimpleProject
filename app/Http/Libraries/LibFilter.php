<?php

namespace App\Http\Libraries;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LibFilter
{

    public static function Rendering($model, $columnsInfo, $filter, $perPage, $has_grant_control = false, $grant = null)
    {
        if ($filter != null) {
            $whereCondition = '$model::';

            if ($has_grant_control) {
                $whereCondition .= "where('grant', 'LIKE', '" . $grant . "%')->";
            }

            // convert $columnsInfo to collection
            $temp = [];
            foreach ($columnsInfo as $key => $value) {
                $temp = array_add($temp, $key, collect($value));
            }
            $columnsInfo = $temp;

            // interpret filter operations [:,|,&]
            $filter = LibFilter::Interpret($filter, $columnsInfo);
            $operations = $filter['operations'];
            $operands = $filter['operands'];

            function find_key($alias, $columnsInfo)
            {
                foreach ($columnsInfo as $key => $col) {
                    if ($col->contains($alias)) {
                        return $key;
                    }
                }
            }

            function add_condition(& $isFirst, & $whereCondition, $key, $value, $operations, & $i)
            {
                if ($isFirst) {
                    $whereCondition .= "where('" . $key . "','" . $value[0] . "')->";
                    $isFirst = FALSE;
                } elseif ($operations != []) {
                    if ($operations[$i] == '&') {
                        $whereCondition .= "where('" . $key . "','" . $value[0] . "')->";
                        $i++;
                    } elseif ($operations[$i] == '|') {
                        $whereCondition .= "orWhere('" . $key . "','" . $value[0] . "')->";
                        $i++;
                    }
                }
            }

            function add_condition_wherethrough(& $isFirst, & $whereCondition, $key, $value, $colInfo, $operations, & $i)
            {
                $wherethrough = $colInfo['wherethrough'];
                $class = $colInfo['class'];
                $el = $class::where($wherethrough['key'], $value)->get();

                $id = $wherethrough['value'];
                $id = $el->first()->$id;

                // echo '<div style="direction: ltr">';
                // \Symfony\Component\VarDumper\VarDumper::dump($wherethrough);
                // echo '</div>';

                if ($isFirst) {
                    $whereCondition .= "where('" . $key . "','" . $id . "')->";
                    $isFirst = FALSE;
                } elseif ($operations != []) {
                    if ($operations[$i] == '&') {
                        $whereCondition .= "where('" . $key . "','" . $id . "')->";
                        $i++;
                    } elseif ($operations[$i] == '|') {
                        $whereCondition .= "orWhere('" . $key . "','" . $id . "')->";
                        $i++;
                    }
                }
            }

            $i = 0;
            $isFirst = TRUE;
            foreach ($operands as $item) {
                $key = find_key(key($item), $columnsInfo);
                if (isset($columnsInfo[$key])) {
                    if (!$columnsInfo[$key]->has('wherethrough')) {
                        add_condition($isFirst, $whereCondition, $key, array_values($item), $operations, $i);
                    } else {
                        add_condition_wherethrough($isFirst, $whereCondition, $key, array_values($item), $columnsInfo[$key], $operations, $i);
                    }
                } else \Session::flash('information', ["فرمت وارد شده اشتباه است !"]);
            }

//            echo '<div style="direction: ltr">';
//            \Symfony\Component\VarDumper\VarDumper::dump($operations);
//            \Symfony\Component\VarDumper\VarDumper::dump($operands);
//            \Symfony\Component\VarDumper\VarDumper::dump($columnsInfo);
//            \Symfony\Component\VarDumper\VarDumper::dump($whereCondition);
//            echo '</div>';


            return eval('return ' . $whereCondition . "paginate($perPage);");
        } else {
            if ($has_grant_control) {
                return $model::where('grant', 'LIKE', $grant . '%')->paginate($perPage);
            } else {
                return $model::paginate($perPage);
            }
        }
    }

    private static function Interpret($filter)
    {
        $operation = null;
        preg_match_all('/[|\&]/', $filter, $operation);
        $operand = preg_split('/[|\&]/', $filter);

        $i = 0;
        $temp = [];
        foreach ($operand as $key => $value) {
            if (isset(explode(':', $value)[0]) && isset(explode(':', $value)[1]))
                $temp[$i++] = [trim(explode(':', $value)[0]) => trim(explode(':', $value)[1])];
            else \Session::flash('information', ["فرمت وارد شده اشتباه است !"]);
        }

        return ['operations' => $operation[0], 'operands' => $temp];
    }
}
