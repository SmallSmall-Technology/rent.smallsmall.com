<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create the login functionality
     *
     * @return void
     */
    public function login(Request $request)
    {
        $email = trim($request->only('email')['email']);
        $password = trim($request->only('password')['password']);

        $user = User::where(['email' => $email, 'password' => md5($password)])->get();

        if(!$user->isEmpty()){
            return response()->json(['data' => $user->toArray(),], 200);
        }else{
            return response()->json($this->sendFailedLoginResponse($request), 422);
        }
    
    }

    public function logout(Request $request)
    {
        $user = $request->user('api');

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }

}
