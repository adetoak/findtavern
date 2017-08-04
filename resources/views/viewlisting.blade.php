@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-lg-3 sidebar">
		<div class="row">
			<div class="box1">			
			    <h3>Search</h3>
	            <ul>          
	              <li>{{ $listing->title }}</li>
	              <li class="hoteladress">{{ $listing->address }}</li>
	              <li><a href= "#editdestination" data-toggle= "modal" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-map-marker">&nbsp;</span>Change Destination</a></li>
	            </ul>
			</div>
		</div>
	@include('_partials.sidebar')
	</div>
	<div class="col-lg-9 main">				
  		<div class="panel-title">
		    <h3>{{ $listing->title }}<small> {{ $listing->address }}</small></h3>
		</div>
  		<div class="panel-body">
  			<div class="row">  				
  				<div id="myCarousel" class="carousel slide">
				  <!-- Carousel items -->
				  <div class="carousel-inner">
				    @if ($listing->image_path != "")				  
				    <div class="active item">
				    	<img src="{{ asset('public/img/listings/listing-'.$listing->listing_id.'/listingimg/'.$listing->image_path) }}" class="img-responsive" width="100%" alt="">
				    </div>
				   	@endif
				    @if ($listing->image_path2 != "")
				    <div class="item">
						<img src="{{ asset('public/img/listings/listing-'.$listing->listing_id.'/listingimg/'.$listing->image_path2) }}" class="img-responsive" width="100%" alt="">
				    </div>
				    @endif
				    @if ($listing->image_path3 != "")
				    <div class="item">
				    	<img src="{{ asset('public/img/listings/listing-'.$listing->listing_id.'/listingimg/'.$listing->image_path3) }}" class="img-responsive" width="100%" alt="">
				    </div>
				    @endif
				    @if ($listing->image_path4 != "")
				     <div class="item">
				    	<img src="{{ asset('public/img/listings/listing-'.$listing->listing_id.'/listingimg/'.$listing->image_path4) }}" class="img-responsive" width="100%" alt="">
				    </div>
				    @endif
				    @if ($listing->image_path5 != "")
				    <div class="item">
				    	<img src="{{ asset('public/img/listings/listing-'.$listing->listing_id.'/listingimg/'.$listing->image_path5) }}" class="img-responsive" width="100%" alt="">
				    </div>
				    @endif
				    @if ($listing->image_path6 != "")
				    <div class="item">
				    	<img src="{{ asset('public/img/listings/listing-'.$listing->listing_id.'/listingimg/'.$listing->image_path6) }}" class="img-responsive" width="100%" alt="">
				    </div>	
				    @endif			  
				  </div>
				  <!-- Carousel nav -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
	  			<div class="tabbable"> <!-- Only required for left/right tabs -->
			            <ul class="nav nav-tabs">
			              <li class="active"><a href="#category" data-toggle="tab"><span class="glyphicon glyphicon-th">&nbsp;</span> CHOOSE CATEGORY</a></li>
			              <li><a href="#description" data-toggle="tab"><span class="glyphicon glyphicon-info-sign">&nbsp;</span> DESCRIPTION</a></li>
			              <li><a href="#policy" data-toggle="tab"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span> POLICY</a></li>
			              <li><a href="#contact" data-toggle="tab"><span class="glyphicon glyphicon-envelope">&nbsp;</span> CONTACT</a></li>
			              <li><a href="#map" data-toggle="tab"><span class="glyphicon glyphicon-map-marker">&nbsp;</span> MAP</a></li>
			            </ul>
			            <div class="tab-content">
				            <div class="tab-pane active" id="category">				            	
				            		<div class="table-responsive">
							            <table class="table table-striped">
								            <thead>
								                <tr>
								                  <th>SubListing Image</th>
								                  <th>SubListing title</th>
								                  <th class="text-center">Capacity</th>
								                  <th class="text-center">Qty Available</th>
								                  <th class="text-center">Rate of Room</th>
								                  <th class="text-center">Action</th>
								                </tr>
								            </thead>
								            <tbody>	
								            @foreach ($sublistings as $sublisting)						            
								                <tr>
								                  	<td class="text-center">
									                  	<img src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path) }}" alt="" class="img-polaroid img-responsive">
													</td>
													<td class="text-center">{{ $sublisting->title }}</td>
								                  <td class="text-center">{{ $sublisting->capacity }}</td>
								                  <td class="text-center">{{ $sublisting->available }}</td>
								                  <td class="text-center">&#8358;{{ number_format($sublisting->price).$sublisting->price_measure }}</td>
								                  <td class="text-center">
								                     <div class="btn-group">
								                      <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button">Action <span class="caret"></span></button>
								                      <ul role="menu" class="dropdown-menu">
								                        <li><a href="{{ url('destination-details/'.$listing->listing_id.'/'.$sublisting->id)}}"><span class="glyphicon glyphicon-list">&nbsp;</span>View Details</a></li>
								                        <li><a href="#booking" data-toggle="modal"><span class="glyphicon glyphicon-bed">&nbsp;</span>Book</a></li>                            
								                      </ul>
								                    </div><!-- /btn-group --> 
								                  </td>
								                </tr> 
								                <div class="modal fade" id = "booking" role = "dialog">
											      	<div class="modal-dialog">
											        	<div class="modal-content">                       
											              	<div class="modal-body">
											              	@include('_partials.book-form')
											              	</div>              
											        	</div>
											      	</div>
											  	</div>
								            @endforeach                                        					     
								            </tbody>						             
							            </table>                
							        </div>					    	            		
				            	
				            </div>
				            <div class="tab-pane" id="description">
				             	<div class="row">		            				            		
				            		
				            	</div>
				            </div>
				            <div class="tab-pane" id="policy">
				              	<div class="row">		            				            		
				            		
				            	</div>
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
 
@stop