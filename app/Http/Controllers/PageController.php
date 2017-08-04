<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Booking;
use App\Listing;
use App\Pages;
use App\Sublisting;
use App\User;
use DB;
use Illuminate\Support\Facades\Log;
use Validator;

class PageController extends Controller
{
    

	public function indexPage(){

		$user = Auth::user();		
		return view('index', compact(array('user')));		
		
	}

	public function destinationsPage(){

		$user = Auth::user();		
		return view('destinations', compact(array('user')));		
		
	}

	public function postdestinationsPage(Request $request){

		$user = Auth::user();		
		$data = $request->all();

		$validator = Validator::make($data, Pages::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
		
		$search = strip_tags($request->Input('destination'));
		$destination =preg_replace('#[ ]#', ' ', $request->Input('destination'));
		$categ = $request->Input('searchcateg');
		$destinationterm = explode(" ", $destination);

		foreach ($destinationterm as $destinations) {
		$destinations = trim($destinations);
		if ($categ != 'all'){
			$searchss = Listing::where('title', 'LIKE', '%'. $destinations .'%', 'and', 'category', '=', '%'.$categ.'%')->orWhere('state', 'LIKE', '%'. $destinations .'%', 'and', 'category', '=', '%'.$categ.'%')->orWhere('city', 'LIKE', '%'. $destinations .'%', 'and', 'category', '=', '%'.$categ.'%')->orWhere('address', 'LIKE', '%'. $destinations .'%', 'and', 'category', '=', '%'.$categ.'%')->paginate(30);
			$count = $searchss->count();
			return view('destinations', compact(array('user', 'searchss', 'search', 'count', 'categ')));
		}else{
			$searchss = Listing::where('title', 'LIKE', '%'. $destinations .'%')->orWhere('state', 'LIKE', '%'. $destinations .'%')->orWhere('city', 'LIKE', '%'. $destinations .'%')->orWhere('address', 'LIKE', '%'. $destinations .'%')->paginate(30);
			$count = $searchss->count();
			return view('destinations', compact(array('user', 'searchss', 'search', 'count', 'categ')));

		
		}

		}
		
		
		}
	}

	public function destinationdetailsPage($listing_id = null, $id = null){

		$user = Auth::user();	
		if (!$listing_id && !$id) 
		{
				return Redirect::back();
		}else
		{

		$listing = Listing::where('listing_id', $listing_id)->first();	
		$sublisting = Sublisting::where('id', $id)->first();
		return view('destination-details', compact(array('user', 'listing', 'sublisting')));		
			
		}
		
	}

	public function viewlistingPage($listing_id = null){

		$user = Auth::user();	
		if (!$listing_id) 
		{
				return Redirect::back();
		}else{

		$listing = Listing::where('listing_id', $listing_id)->first();	
		$sublistings = Sublisting::where('listing_id', $listing_id)->paginate(5);
		return view('viewlisting', compact(array('user', 'listing', 'sublistings')));		
		}
		
	}

}
