<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Booking;
use App\Listing;
use App\Pages;
use App\Sublisting;
use App\User;
use App\Mail\Welcome;
use DB;
use Illuminate\Support\Facades\Log;
use Validator;

class UserController extends Controller
{
    
	public function getIndex(){
		
		
	}

	public function loginForm(){
		
		return view('login');
	
	}

	public function postLogin(Request $request){
		
		$data = $request->all();

		$validator = Validator::make($data, User::$auth_rules);

		if ($validator->fails())
		{

			return redirect('login')->withErrors($validator)->withInput();

		}		

		if (auth()->attempt(array('email' => $request->input('email'), 'password' => $request->input('password'))))
        {
            if(auth()->user()->is_activated == '0'){
                $this->logout();
                return back()->with('warning',"First please active your account.");
            }
            return redirect()->to('/');
        }else{
            return back()->with('error','your username and password are wrong.');
        }
	}

	public function getLogout(){
		Auth::logout();
		return redirect()->route('/');
	}
	public function registerUser(){
		
		return view('register');
	
	}
	public function postUser(Request $request){

		$user = Auth::user();
		$data = $request->all();

		$validator = Validator::make($data, User::$rules);

		if ($validator->fails())
		{
			return redirect('register')->withErrors($validator)->withInput();
		}else{		

		$user = new User();				
		$user->full_name = '';
        $user->username = $request->input('username');
        $user->telephone = $request->input('telephone');               
        $user->email = $request->input('email');        
        $user->password = bcrypt($request->input('password'));  
        $user->country = 'Nigeria';
        $user->state = '';
        $user->resident_address = '';                    
        $user->terms = $request->input('terms') ? 1 : 0;
       
		  	if ($user->save()){	
		  		
		  		$user['link'] = str_random(30);

	            DB::table('user_activations')->insert(['id_user'=>$user['id'],'token'=>$user['link']]);

	            Mail::send('emails.activation', $user, function($message) use ($user) {
	                $message->to($user['email']);
	                $message->subject('Findtavern - Activation Code');
	            });

		       	$request->session()->flash('success_msg', 'We sent activation code. Please check your mail.');       	
	        	return redirect('register');        	
	       	}else{
	        	$request->session()->flash('error_msg', 'Try Again: Could not sign you up.');       	
	        	return redirect('register');   
	       	}	  	   
		}		        
	}		

    public function userActivation($token)
    {
        $check = DB::table('user_activations')->where('token',$token)->first();

        if(!is_null($check)){
            $user = User::find($check->id_user);

            if($user->is_activated == 1){
                return redirect()->to('login')
                    ->with('success',"user are already actived.");                
            }

            $user->update(['is_activated' => 1]);
            DB::table('user_activations')->where('token',$token)->delete();

            return redirect()->to('login')
                ->with('success',"user active successfully.");
        }

        return redirect()->to('login')
                ->with('warning',"your token is invalid.");
    }
}
