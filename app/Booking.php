<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	// Add your validation rules here

	public static $rules = [
						
		'checkin' => 'required|date_format:Y-m-d--h:ia',		
		'stay' => 'required',
		'qty' => 'required',
		


	];

	public static $auth_rules = [
						
		'checkin' => 'required|date_format:Y-m-d--h:ia',		
		'firstname' => 'required',
		'lastname' => 'required',		
		'country' => 'required',
		'state' => 'required',
		'address' => 'required',
		'phoneno' => 'required',
		


	];
	

	protected $table = 'transactions';

	// Don't forget to fill this array

	protected $fillable = [];

	
}
