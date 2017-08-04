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

class BookingController extends Controller
{
    
	public function newBooking(Request $request){

		$user = Auth::user();	
		if (!$listing_id && !$id) 
		{			
			
		}
		else
		{

			$data = $request->all();

			$validator = Validator::make($data, Booking::$rules);
			
			if ($validator->fails())
			{

				return redirect()->withErrors($validator)->withInput();

			}else{

			$listing = Listing::where('listing_id', $listing_id)->first();	
			$sublisting = Sublisting::where('id', $id)->first();

			$stay = $request->input('stay');
			$checkin = $request->input('checkin');
			$qty = $request->input('qty');

			$checkinconv = strtotime($checkin);
			$checkout = floor(($checkinconv * $stay)/86400);

			$subtotal = $sublisting->price*$stay*$qty;
			

			return view('book', compact(array('user', 'listing', 'sublisting', 'stay', 'checkin', 'qty', 'subtotal', 'checkout')));		
			// return Redirect::to('book/'.$listing->listing_id.'/'.$sublisting->id)->with($checkin, $stay, $qty, $user, $listing, $sublisting);

			}
		
		}		
		
	}
	

	public function postBookings(Request $request){

		$user = Auth::user();		

		$data = $request->all();

		$validator = Validator::make($data, Booking::$auth_rules);
		
		if ($validator->fails())
		{

			return redirect()->withErrors($validator)->withInput();

		}else{		

		$transaction_id = $request->input('transactionid');
		
		$booking = new Booking();		
        $booking->transaction_id = $request->input('transactionid');
		$booking->user_id = $user->id;        
        $booking->listing_id = $request->input('listingid');
        $booking->sublisting_id = $request->input('sublistingid');   
        $booking->checkin = $request->input('checkin');        
        $booking->checkout = $request->input('checkout');        
        $booking->customer_fname = $request->input('firstname');   
        $booking->customer_lname = $request->input('lastname');   
        $booking->country = $request->input('country'); 
        $booking->state = $request->input('state');                    
        $booking->customer_residency = $request->input('address');
        $booking->customer_telephone = $request->input('phoneno');                 
        $booking->transaction_status = 0; 

        $booking->save();

        return Redirect::to('invoice/'.$transaction_id);
		
		}
	}


	public function bookInvoice($transaction_id){

		$user = Auth::user();	

		$invoice = Booking::where('transaction_id', $transaction_id)->first();
		$listing = Listing::where('listing_id', $invoice->listing_id)->first();
		$sublisting = Sublisting::where('id', $invoice->sublisting_id)->first();
		return view('invoice', compact(array('user', 'invoice', 'listing', 'sublisting')));		
		
	}

	public function myBookings(){

		$user = Auth::user();		
		return view('manage.my-bookings', compact(array('user')));		
		
	}
}
