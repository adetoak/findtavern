<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
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
        //$this->middleware('guest',['except' => ['getVerification', 'getVerificationError']]);
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'telephone' => 'required|min:10|max:10',
            'username' => 'required|min:6|max:12',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'full_name' => " ",
            'username' => $data['username'],            
            'telephone' => $data['telephone'],
            'country' => " ",
            'state' => " ",
            'city' => " ",
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'terms' => $data['terms'] ? 1 : 0,
        ]);
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()){
            $data = $this->create($input)->toArray();

            $data['token'] = str_random(25);

            $user = User::find($data['id']);
            $user->token = $data['token'];
            $user->save();

            Mail::send('emails.activation', $data, function($message) use ($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
            return redirect(route('login'))->with('status', 'Confirmation email has been sent. Please check your email');
        }
        return redirect(route('login'))->with('status', '$validator');
    }

    public function confirmation($token)
    {
        $user = User::where('token', $token)->first();

        if (!is_null($user)){
            $user->confirmed = 1;
            $user->token = '';
            $user->save;
            return redirect(route('login'))->with('status', 'Your activation is completed.');
        }
        return redirect(route(login))->with('status', 'Try again: Something went wrong');
    }
}
