<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\EloquentUserProvider;


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

    use AuthenticatesUsers{
        username as protected usernametrait;
        validateLogin as protected validating;
    }

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
     * 
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


   
public function login(Request $request)
    {

      
       $validacion=  $this->validate($request, [
        'username'=>'required',
            'pwd'=>'required',
        ]);

      
        $login=Auth::attempt($request->only('username', 'pwd'));

            if($login)
            {
                return 'shi';
            }

            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');

    }

 
}
