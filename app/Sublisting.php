<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sublisting extends Model
{
	// Add your validation rules here

	public static $sublisting_rules = [
						
		//'listingid' => 'required',
		'sublistingtitle' => 'required|max:100',		
		'available' => 'required',
		'capacity' => 'required',
		'description' => 'required',
		'minbookingtime' => 'required',
		'minbookingtimemeasure' => 'required',
		'price' => 'required',
		'pricemeasure' => 'required',		
		'sublistingamenities' => 'required',
		'sublistingpolicy' => 'required',
		'sublistingimg' => 'required|image',
		//'sublistingimg2' => 'image',
		//'sublistingimg3' => 'image',
		//'sublistingimg4' => 'image',
		//'sublistingimg5' => 'image',
		//'sublistingimg6' => 'image',


	];
	

	protected $table = 'sub-listings';

	// Don't forget to fill this array

	protected $fillable = [];

	
}