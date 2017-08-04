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

class SublistingController extends Controller
{
    

	public function subListing($listing_id){

		$user = Auth::user();
		$listing = Listing::where('listing_id', $listing_id)->first();		
		return view('manage.new-sub-listing', compact(array('listing', 'user')));		
		
	}

	public function postsubListing(Request $request){

		$user = Auth::user();
		$data = $request->all();

		$validator = Validator::make($data, Sublisting::$sublisting_rules);

		if ($validator->fails())
		{
			return redirect('manage/new-sub-listing/'.$listingid)->withErrors($validator)->withInput();
		}else{

		$sublistingtitle = $request->Input('sublistingtitle');
		$pic = $request->file('sublistingimg');		
		$listingid = $request->Input('listingid');
		$filename = $pic->getClientOriginalName();
		$pic2 = $request->file('sublistingimg2');
		$img2name = $pic2->getClientOriginalName();
		$pic3 = $request->file('sublistingimg3');
		$img3name = $pic3->getClientOriginalName();
		$pic4 = $request->file('sublistingimg4');
		$img4name = $pic4->getClientOriginalName();

		$sublisting = new Sublisting();		
        $sublisting->user_id = $user->id;
        $sublisting->listing_id = $request->Input('listingid');
        $sublisting->title = $request->Input('sublistingtitle');
        $sublisting->available = $request->Input('available');        
        $sublisting->capacity = $request->Input('capacity');        
        $sublisting->description = $request->Input('description');        
        $sublisting->min_booking_time = $request->Input('minbookingtime');   
        $sublisting->min_bookingtime_measure = $request->Input('minbookingtimemeasure');   
        $sublisting->price = $request->Input('price');   
        $sublisting->price_measure = $request->Input('pricemeasure');                   
        $sublisting->amenities = $request->Input('sublistingamenities');                 
        $sublisting->policy = $request->Input('sublistingpolicy'); 
        $sublisting->image_path = $filename;             
        $sublisting->image_path2 = $img2name;
        $sublisting->image_path3 = $img3name;
        $sublisting->image_path4 = $img4name;
        $sublisting->image_path5 = '';
        $sublisting->image_path6 = '';
      
	    
       	if ($request->file('sublistingimg')->move('public/img/listings/listing-'.$listingid.'/sublistingimg/'.$sublistingtitle.'/', $filename)){

       		if ($request->file('listingimg2') != "") {
       			$pic2 = $request->file('sublistingimg2');		
				$listingid = $request->Input('listingid');
				$img2name = $pic2->InputClientOriginalName();
				$request->file('sublistingimg2')->move('public/img/listings/listing-'.$listingid.'/sublistingimg'.$sublistingtitle.'/', $img2name);
       		}
       		if ($request->file('sublistingimg3') != "") {
       			$pic3 = $request->file('sublistingimg3');		
				$listingid = $request->Input('listingid');
				$img3name = $pic3->getClientOriginalName();
				$request->file('sublistingimg3')->move('public/img/listings/listing-'.$listingid.'/sublistingimg'.$sublistingtitle.'/', $img3name);
       		}
       		if ($request->file('sublistingimg4') != "") {
       			$pic4 = $request->file('sublistingimg4');		
				$listingid = $request->Input('listingid');
				$img4name = $pic4->getClientOriginalName();
				$request->file('sublistingimg4')->move('public/img/listings/listing-'.$listingid.'/sublistingimg'.$sublistingtitle.'/', $img4name);
       		}
       		/*if ($request->file('sublistingimg5') != "") {
       			$pic5 = $request->file('sublistingimg5');		
				$listingid = $request->Input('listingid');
				$img5name = $pic5->getClientOriginalName();
				$request->file('sublistingimg5')->move('public/img/listings/listing-'.$listingid.'/sublistingimg'.$sublistingtitle.'/', $img5name);
       		}
       		if ($request->file('sublistingimg6') != "") {
       			$pic6 = $request->file('sublistingimg6');		
				$listingid = $request->Input('listingid');
				$img6name = $pic6->getClientOriginalName();
				$request->file('sublistingimg6')->move('public/img/listings/listing-'.$listingid.'/sublistingimg'.$sublistingtitle.'/', $img6name);
       		}*/

       		$sublisting->save();
       		$request->session()->flash('success_msg', 'Success.');       	
    		return redirect('manage/new-sub-listing/'.$listingid);        	
    	}else{
    		$request->session()->flash('error_msg', 'Try Again: Listing could not be uploaded.');       	
    		return redirect('manage/new-sub-listing/'.$listingid);   
    	}	    
	    
		}
			
		
	}
}
