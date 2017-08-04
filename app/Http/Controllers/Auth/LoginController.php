<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request){
        
        $data = $request->all();

        $validator = Validator::make($data, User::$auth_rules);

        if ($validator->fails())
        {

            return redirect('login')->withErrors($validator)->withInput();

        }       

        if (auth()->attempt(array('email' => $request->input('email'), 'password' => $request->input('password'))))
        {
            if(auth()->user()->confirmed == '0'){
                //$this->logout();
                Auth()->logout();
                return back()->with('Warning:',"Please activate your account.");
            }
            return redirect()->to('/');
        }else{
            return back()->with('error','your username and password are wrong.');
        }
    }
}
