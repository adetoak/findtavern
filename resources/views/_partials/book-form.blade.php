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
			<p><b>Stay:</b>   </p>
			<p><b>Quantity Booked:</b>  </p>
			<p><b>Booking Total:</b>&#8358;  </p>				   				 		
					    <!-- Nested media object -->				    
		</div>
		</div>											
	</div>
</div>
<form method="get" action="{{ url('book/'.$listing->listing_id.'/'.$sublisting->id) }}">
	<div class="form-group">
		<label for="inputEmail3" class="control-label">Check in:</label>
		<div class="form-group">
		    <input type="date" name="checkin" min="{{ date('Y-m-d') }}" required class="form-control" value="{{ date('Y-m-d--h:ia') }}" />
		</div>
	</div>		        		        								     															
	<div class="form-group">
	    <label for="qty-1" class="control-label"> {{ $sublisting->price_measure }}(s):</label>
	        <div class="form-group">
	            <input type="number" name="stay" min="1" required class="form-control" value="" />	   
	        </div>
	</div>	
	<div class="form-group">
	    <label for="qty-1" class="control-label"> Quantity:</label>
	    <div class="form-group">
	        <input type="number" name="qty" min="1" required class="form-control" value="" />	   
	    </div>
	</div>		
	<div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-bed">&nbsp;</span>Book</button>		    
    </div>
</form>        		       
