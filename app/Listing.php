<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
	// Add your validation rules here

	public static $rules = [
						
		'listingtitle' => 'required|max:100',		
		//'listingid' => 'required|unique:listings',
		'listingtype' => 'required',
		'listingcateg' => 'required',
		'description' => 'required',
		'minprice' => 'required',
		'listingcountry' => 'required',
		'listingstate' => 'required',
		'listingcity' => 'required',
		'listingaddress' => 'required',
		'listingamenities' => 'required',
		'listingpolicy' => 'required',
		'listingimg' => 'required|image',
		'listingimg2' => 'image',
		'listingimg3' => 'image',
		'listingimg4' => 'image',
		'listingimg5' => 'image',
		'listingimg6' => 'image',


	];
	

	protected $table = 'listing_temp';

	// Don't forget to fill this array

	protected $fillable = [];

	
}