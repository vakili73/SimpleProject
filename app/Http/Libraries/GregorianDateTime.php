<?php

namespace App\Http\Libraries;

use Morilog\Jalali\jDateTime;

class GregorianDateTime
{

    public static function toGregorianDateTime($dateTimePickerFormatString)
    {
        $split = explode(' ', $dateTimePickerFormatString);
        $date = explode('-', $split[0]);
        $time = explode(':', $split[1]);
        $date = jDateTime::toGregorian((int)$date[0], (int)$date[1], (int)$date[2]);
        $result = date('Y-m-d H:i:s', mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]));
        return $result;
    }
    
}
