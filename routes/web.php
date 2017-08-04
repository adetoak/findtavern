<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// index page
	Route::get('/', array('as' => 'index', 'uses' => 'PageController@indexPage'));	
	//destinations route
	Route::get('destinations', array('as' => 'destinations', 'uses' => 'PageController@destinationsPage'));
	Route::post('destinations', array('as' => 'destinations', 'uses' => 'PageController@postdestinationsPage'));
	//destination-details route
	Route::get('destination-details/{listing_id}/{id}', array('as' => 'destination-details', 'uses' => 'PageController@destinationdetailsPage'));
	//viewlisting route
	Route::get('viewlisting/{listing_id}', array('as' => 'viewlisting', 'uses' => 'PageController@viewlistingPage'));

	// user route
	//Route::get('login', array('as' => 'login', 'uses' => 'UserController@loginForm'));
	//Route::post('login', array('as' => 'login', 'uses' => 'UserController@postLogin'));
	//Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@getLogout'));
	//Route::get('register', array('as' => 'register', 'uses' => 'UserController@registerUser'));
	//Route::post('register', array('as' => 'register', 'uses' => 'UserController@postUser'));
	//Route::get('user/activation/{token}', 'Auth\AuthController@userActivation');
	
	//book route
	Route::group(array('middleware' => 'auth'), function(){
		
		Route::get('book/{listing_id}/{id}', array('as' => 'book', 'uses' => 'BookingController@newBooking'));
		Route::post('book/postbook', array('as' => 'book/postbook', 'uses' => 'BookingController@postBookings'));
		Route::get('invoice/{transaction_id}', array('as' => 'invoice', 'uses' => 'BookingController@bookInvoice'));

	});
	// Manage Folder
	Route::group(array('prefix' => 'manage', 'middleware' => 'auth'), function(){

		//Dashboard route		
		Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'ListingController@dashboardPage'));
		// My Booking route
		Route::get('my-bookings', array('as' => 'my-bookings', 'uses' => 'BookingController@myBookings'));		
		// My-listing route
		Route::get('my-listings', array('as' => 'my-listings', 'uses' => 'ListingController@myListing'));		
		// Listing routes
		Route::get('new-listing', array('as' => 'new-listing', 'uses' => 'ListingController@newListing'));		
		Route::post('new-listing', array('as' => 'new-listing', 'uses' => 'ListingController@postListing'));
		//Listing Details route
		Route::get('listing-details/{listing_id}', array('as' => 'listing-details', 'uses' => 'ListingController@listingDetails'))->where('id', '[1-9][0-9]*');		
		// Sub Listing Route
		Route::get('new-sub-listing/{listing_id}', array('as' => 'new-sub-listing', 'uses' => 'SublistingController@subListing'))->where('id', '[1-9][0-9]*');		
		Route::post('new-sub-listing/{listing_id}', array('as' => 'new-sub-listing', 'uses' => 'SublistingController@postsubListing'))->where('id', '[1-9][0-9]*');	
	
	});
Route::get('test', function()
{
    dd(Config::get('mail'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(array('prefix' => 'Auth'), function(){
	Route::get('/users/confirmation/{token}', array('as' => '/users/confirmation/{token}', 'uses' => 'RegisterController@confirmation'))->name('confirmation');		
});
