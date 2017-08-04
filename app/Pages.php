<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
	// Add your validation rules here

	public static $rules = [
						
		'destination' => 'required|max:200',		
		'searchcateg' => 'required',
		
	];
	

	protected $table = 'listing_temp';

	// Don't forget to fill this array

	protected $fillable = [];

	
}