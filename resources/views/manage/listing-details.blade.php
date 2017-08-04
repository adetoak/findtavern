@extends('layouts.app')
@section('content')
<div class="container">
	@include('manage._partials.sidebar')
	<div class="col-lg-9 main">		
		<div class="panel panel default">
			<div class="page-header">
	        	<h2>My Listings<small class="pull-right">{{date('D d M, Y -- h:i')}}</small></h2>
	    	</div>
			<div class="panel-body">
				<div class="row">		               
                  	<div class="col-md-6">
  		              	<a class="btn btn-primary navbar-btn" href="{{ url('manage/new-sub-listing/'.$listing->listing_id) }}">New Sub-Listing</a>
                   	<!--  <a class="btn btn-info navbar-btn" href="../admin/mail">Students</a>
  		              <a class="btn btn-info navbar-btn" href="../admin/mail">Vsit</a>
  		              <a class="btn btn-info navbar-btn" href="../admin/mail">Canada</a>  -->
                  	</div>
                 	<div class="col-md-6">
		                <form class="navbar-form pull-right" action="#" role="search">
		                  <div class="form-group">
		                    <div class="input-group">
	                            <input type="text" class="form-control" name="search" placeholder="Sub-Listing ID/Sub-Listing title...">
	                            <span class="input-group-btn">
	                              <button class="btn btn-info" type="submit">Search!</button>
	                            </span>
	                        </div><!-- /input-group -->
		                  </div>
		                </form>                    
                 	</div>
            	</div>
            	<p></p>
           		<div class="row">		                 	 
                 	@include('manage._partials.listingname-media')
                 	<p></p>		                 	 
		  			<div class="tabbable"> <!-- Only required for left/right tabs -->
			            <ul class="nav nav-tabs">
			              <li class="active"><a href="#category" data-toggle="tab">SUB LISTINGS</a></li>
			              <li><a href="#description" data-toggle="tab">DESCRIPTION</a></li>
			              <li><a href="#policy" data-toggle="tab">POLICY</a></li>
			              <li><a href="#contact" data-toggle="tab">CONTACT</a></li>
			              <li><a href="#map" data-toggle="tab">MAP</a></li>
			            </ul>
			            <div class="tab-content">
				            <div class="tab-pane active" id="category">				            	
			            		<div class="table-responsive">
						            <table class="table table-striped">
							            <thead>
							            @foreach($sublistings as $sublisting)
							                <tr>
							                  <th>Image</th>
							                  <th>Title</th>
							                  <th class="text-center">Capacity</th>
							                  <th class="text-center">Price</th>
							                  <th class="text-center">Qty Available</th>
							                  <th class="text-center">Action</th>
							                </tr>
							            </thead>
							            <tbody>							            
							                <tr>
							                  	<td class="text-center">	                  	
													<img src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path) }}" alt="" class="img-polaroid img-responsive">		
												</td>
												<td class="text-center">{{ $sublisting->title }}</td>
							                  	<td class="text-center">{{ $sublisting->capacity }}</td>
							                  	<td class="text-center">&#8358;{{ number_format($sublisting->price).$sublisting->price_measure }}</td>
							                  	<td class="text-center">{{ $sublisting->available }}</td>
							                  	<td class="text-center">
							                    <div class="btn-group">
							                      <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button">Action <span class="caret"></span></button>
							                      <ul role="menu" class="dropdown-menu">
							                        <li><a href="{{ url('manage/edit-sub-listing') }}">View details</a></li>
                    								<li><a href="{{ url('manage/new-sub-listing/'.$sublisting->listing_id) }}">New Sub-listing</a></li>
                   									<li><a href="{{ url('manage/edit-sub-listing/'.$sublisting->id) }}">Edit Sub-Listing</a></li>                   
							                      </ul>
							                    </div><!-- /btn-group --> 
							                  	</td>
							                </tr>                                          			
							                @endforeach            						             
							            </tbody>						             
						            </table> 
						            {{ $sublistings->links() }}                
						        </div>					    	            		
				            	
				            </div>
				            <div class="tab-pane" id="description">	            		
				            	<p>{{ $listing->description }}</p>					            	
				            </div>
				            <div class="tab-pane" id="policy">	  				            		
				            	<p>{{ $listing->policy }}</p>
				            </div>
				            <div class="tab-pane" id="contact">
				              	<div class="row">		            				            		
				            		
				            	</div>
				            </div>
				            <div class="tab-pane" id="map">
				              	<div class="row">		            				            		
				            		
				            	</div>
				            </div>
			          	</div>
			       	</div>		                
            	</div> 
				                       
			</div>  				
  		</div>
	</div>
</div>
@stop