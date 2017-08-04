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

class ListingController extends Controller
{
    public function dashboardPage(){

		$user = Auth::user();		
		return view('manage.dashboard', compact(array('user')));		
		
	}

	public function myListing(){

		$user = Auth::user();
		$listings = Listing::where('user_id', 'LIKE', $user->id)->paginate(20);
		return view('manage.my-listings', compact(array('user', 'listings')));		
		
	}
	public function newListing(){

		$user = Auth::user();
		return view('manage.new-listing', compact(array('user')));		
		
	}

	public function postListing(Request $request){

		$user = Auth::user();
		$data = $request->all();

		$validator = Validator::make($data, Listing::$rules);

		if ($validator->fails())
		{
			return redirect('manage/new-listing')->withErrors($validator)->withInput();
		}else{

		$pic = $request->file('listingimg');		
		$listingid = $request->Input('listingid');
		$filename = $pic->getClientOriginalName();
		$pic2 = $request->file('listingimg2');
		$img2name = $pic2->getClientOriginalName();
		$pic3 = $request->file('listingimg3');
		$img3name = $pic3->getClientOriginalName();
		$pic4 = $request->file('listingimg4');	
		$img4name = $pic4->getClientOriginalName();


		$listing = new Listing();		
		$listing->user_id = $user->id;
        $listing->title = $request->Input('listingtitle');
        $listing->listing_id = $request->Input('listingid');
        $listing->type = $request->Input('listingtype');        
        $listing->category = $request->Input('listingcateg');        
        $listing->description = $request->Input('description');        
        $listing->min_price = $request->Input('minprice');   
        $listing->country = $request->Input('listingcountry');   
        $listing->state = $request->Input('listingstate');   
        $listing->city = $request->Input('listingcity');            
        $listing->address = $request->Input('listingaddress');
        $listing->amenities = $request->Input('listingamenities');                 
        $listing->policy = $request->Input('listingpolicy'); 
        $listing->image_path = $filename; 
        $listing->image_path2 = $filename;
        $listing->image_path3 = $filename;
        $listing->image_path4 = $filename;
        $listing->image_path5 = $filename;
        $listing->image_path6 = $filename;
        $listing->confirm_key = bcrypt(uniqid(rand()));       

	    
       	if ($request->file('listingimg')->move('public/img/listings/listing-'.$listingid.'/listingimg', $filename)){

       		if ($request->file('listingimg2') != "") {
       			$pic2 = $request->file('listingimg2');		
				$listingid = $request->Input('listingid');
				$img2name = $pic2->getClientOriginalName();
				$request->file('listingimg2')->move('public/img/listings/listing-'.$listingid.'/listingimg', $img2name);
       		}
       		if ($request->file('listingimg3') != "") {
       			$pic3 = $request->file('listingimg3');		
				$listingid = $request->Input('listingid');
				$img3name = $pic3->getClientOriginalName();
				$request->file('listingimg3')->move('public/img/listings/listing-'.$listingid.'/listingimg', $img3name);
       		}
       		if ($request->file('listingimg4') != "") {
       			$pic4 = $request->file('listingimg4');		
				$listingid = $request->Input('listingid');
				$img4name = $pic4->getClientOriginalName();
				$request->file('listingimg4')->move('public/img/listings/listing-'.$listingid.'/listingimg', $img4name);
       		}
       		/*if ($request->file('listingimg5') != "") {
       			$pic5 = $request->file('listingimg5');		
				$listingid = $request->Input('listingid');
				$img5name = $pic5->getClientOriginalName();
				$request->file('listingimg5')->move('public/img/listings/listing-'.$listingid.'/listingimg', $img5name);
       		}
       		if ($request->file('listingimg6') != "") {
       			$pic6 = $request->file('listingimg6');		
				$listingid = $request->Input('listingid');
				$img6name = $pic6->getClientOriginalName();
				$request->file('listingimg6')->move('public/img/listings/listing-'.$listingid.'/listingimg', $img6name);
       		}
			*/
       		$listing->save();
       		$request->session()->flash('success_msg', 'Success.');       	
    		return redirect('manage/new-listing');        	
	    	}else{
	    		$request->session()->flash('error_msg', 'Try Again: Listing could not be uploaded.');       	
	    		return redirect('manage/new-listing');   
	    	}

		}
			
		
	}

	public function listingDetails($listing_id){

		$user = Auth::user();

		$listing = Listing::where('listing_id', $listing_id)->first();
		$sublistings = Sublisting::where('listing_id', $listing_id)->paginate(15);		
		return view('manage.listing-details', compact(array('sublistings', 'user', 'listing')));		
		
	}
}
