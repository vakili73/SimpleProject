<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function postIndex(Request $request)
    {
        if ($request->ajax()) {
            if ($request->old_username == $request->username) {
                $this->validate($request, [
                    'username' => 'required:45',
                    'password' => 'required | confirmed | min:6',
                ]);
            } else {
                $this->validate($request, [
                    'username' => 'required:45 | unique:users',
                    'password' => 'required | confirmed | min:6',
                ]);
            }

            echo \App\User::where('username', $request->old_username)
                ->update([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                ]);

        } else {
            return response('Unauthorized.', 401);
        }

    }

}
