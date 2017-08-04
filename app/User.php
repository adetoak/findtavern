<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $rules = [
                        
        'username' => 'required|between:6,12|unique:users',
        'telephone' => 'required|unique:users',
        'email' => 'required|email|unique:users',                   
        'password' => 'required|between:8,16|same:password_confirmation',
        'terms' => 'accepted',
        //'g-recaptcha-response' => 'required|captcha',

    ];

    public static $auth_rules = [
                        
        'email' => 'required|exists:users,email',
        'password' => 'required',
        


    ];
    public static $account_rules = [
                        
        'fullname' => 'min:3',              
        'email' => 'email',
        'phoneno' => 'max:11',
        
        


    ];
    public static $forgot_rules = [
                                            
        'email' => 'email|exists:users,email',
        
    ];
    public static $pass_rules = [
                        
                
        'password' => 'between:8,16|same:confirmnewpassword',       

    ];
    
    protected $table = 'users';
    protected $fillable = [
        'full_name', 'username', 'telephone', 'country', 'state', 'city', 'email', 'password', 'term',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
