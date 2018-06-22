<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticated()
    {
        global $redirectTo;

        if (Auth::user()->state == '0') {
            $username = Auth::user()->username;
            \Session::put('login_information', ["  نام کاربری $username غیر فعال است."]);
            Auth::logout();
        } elseif (\Session::has('login_information')) {
            \Session::forget('login_information');
        }

        \Session::put('permissions', Auth::user()->group->permissions);

        return redirect()->intended($redirectTo);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'groups_id' => 'required|numeric',
            'username' => 'required|max:45|unique:users',
            'name' => 'required|max:255',
            'grant' => 'required|max:20|unique:users',
//            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'groups_id' => $data['groups_id'],
            'username' => $data['username'],
            'name' => $data['name'],
            'grant' => $data['grant'],
//            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
