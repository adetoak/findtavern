@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<p></p>		     		    	
		<div class="panel panel-default">
			<div class="panel-heading">
		        <div class="panel-title">	            
		            <h4>Your Booking Details</h4>	            
		         </div>
		    </div>
			<div class="panel-body">
				<div class="media">
			        <a class="pull-left" href="#">
					    <img class="media-object" src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path) }}">
				    </a>
					<div class="media-body">
					    <h4 class="media-heading">{{ $listing->title }} <small>{{ $listing->address }}</small></h4>
						<p><b>Sub LIsting Title:</b> {{ $sublisting->title }}</p>
						<p><b>Price:</b> &#8358;{{ number_format($sublisting->price).$sublisting->price_measure }}</p>
						<p><b>Stay:</b> {{ $stay }}</p>
						<p><b>Quantity Booked:</b> {{ $qty }}</p>
						<p><b>Sub Total:</b>&#8358;{{ number_format($subtotal) }}</p>				   				 
						<p><a href="#booking" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-wrench">&nbsp;</span>Edit Booking</a></p>				   				 
					    <!-- Nested media object -->				    
					</div>
				</div>											
			</div>
		</div>

			<div><i>If you are reserving for an individual, please specify contact of individual</i></div>
		</div>	
	</div>
	<div class="row">
		    <form id="form-horizontal" method="post" action="{{ url('book/postbook') }}">
		    <input type="hidden" name="listingid" value="{{ $listing->listing_id }}" />			
		    <input type="hidden" name="transactionid" value="{{ str_shuffle('1234').rand(10, 999) }}" />			
		    <input type="hidden" name="sublistingid" value="{{ $sublisting->id }}" />			
				<div class="col-md-6">
			        <div class="form-group">
					    <label for="inputEmail3" class="control-label">Check In:</label>			        
				        <input name="checkin" type="text" placeholder="(YYYY-MM-DD)" value="{{ $checkin }}" class="form-control" readonly required="required" />			    
				    </div>
					<div class="form-group">
					    <label for="inputPassword3" class="control-label">First Name:</label>			    			      
					    <input name="firstname" type="text" placeholder="First name" class="form-control" value="{{ $user->first_name }}" required />
					    {{ $errors->first('firstname', '<p class="has-error">:message</p>') }}    	   
					</div>
					<div class="form-group"> 
					    <label class="control-label">Residency*:</label>             
					    <div class="form-inline">                        
						    <input type="text" class="form-control" name="country" value="{{ $user->country }}" placeholder="Country" /> {{ $errors->first('country', '<p class="has-error">:message</p>') }}   
						    <input type="text"  class="form-control" name="state" value="{{ $user->state }}" placeholder="State" /> 
						    {{ $errors->first('state', '<p class="has-error">:message</p>') }}   
						</div>                             
					</div>                       
					<div class="form-group">			                                       
					    <input type="text" name="address" placeholder="Residential Address" value="{{ $user->resident_address }}" class="form-control" required />		
					    {{ $errors->first('address', '<p class="has-error">:message</p>') }}   
					</div> 							
				</div>
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="inputPassword3" class="control-label">Check Out:</label>			   	 
					    <input type="text" name="checkout" placeholder="(YYYY-MM-DD)" value="{{ $checkout }}" readonly class="form-control" required="required" />			    
					</div>			 
					<div class="form-group">
					    <label for="inputPassword3" class="control-label">Last Name:</label>			     
					    <input name="lastname" type="text" placeholder="Last name" class="form-control" value="{{ $user->last_name }}" id="lastname" />
					    {{ $errors->first('lastname', '<p class="has-error">:message</p>') }}    	    
					</div>
					<div class="form-group">
					    <label for="inputPassword3" class="control-label">Mobile No:</label>			    
					    <input name="phoneno" type="text" class="form-control" id="phoneno" maxlength="11" value="{{ $user->telephone }}" placeholder="Please type your valid mobile no.." />
					    {{ $errors->first('phoneno', '<p class="has-error">:message</p>') }}    	    
					</div>							
					<div class="form-group">			    
					    <button type="submit" class="btn btn-primary pull-right">Proceed &gt;&gt;</button>
					</div>			   
				</div>					
			</form>						
	</div>							
</div>
 <div class="modal fade" id = "booking" role = "dialog">
      <div class="modal-dialog">
        <div class="modal-content">                      
              <div class="modal-body">                                                   
          		@include('_partials.book-form')
              </div>             
        </div>
      </div>
  </div>
@stop