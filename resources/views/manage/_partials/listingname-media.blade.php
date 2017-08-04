<div class="media">
	<a class="pull-left" href="#">
		<img class="media-object thumbnails" src="{{ asset('public/img/listings/listing-'.$listing->listing_id.'/listingimg/'.$listing->image_path) }}">
	</a>
	<div class="media-body">
	    <h4 class="media-heading">{{ $listing->title }}</h4>
		<p>Listing Address: <b> {{ $listing->address }}</b> </p>
		<p>Listing ID: <b> {{ $listing->listing_id }}</b></p>
		<p>Min. Listing Price: <b>&#8358;{{ number_format($listing->min_price) }}</b> </p>					
		<!-- Nested media object -->				    
	</div>
</div>