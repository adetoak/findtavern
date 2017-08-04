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
	              <li><a href= "#editdestination" data-toggle= "modal" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-map-marker">&nbsp;</span>Change Destination</a></li>
	            </ul>
			</div>
		</div>
	@include('_partials.sidebar')
	</div>
	<div class="col-lg-9">		
  		<div class="page-header">
		    <h3>{{ $listing->title }} <small class="">{{ $listing->address }}</small></h3>
		</div>
  		<div class="panel-body">
  			<div class="row">  			
	  			<div id="myCarousel" class="carousel slide">
				  <!-- Carousel items -->
				  <div class="carousel-inner">
				  	@if ($listing->image_path != "") 
				    <div class="active item">
					   	<img src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path) }}" class="img-responsive" width="100%" alt="">
					</div> 			
					@endif
					@if ($listing->image_path2 != "")	
				    <div class="active">
					   	<img src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path2) }}" class="img-responsive" width="100%" alt="">
					</div>
					@endif
					@if ($listing->image_path3 != "")
					<div class="item">
						<img src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path3) }}" class="img-responsive" width="100%" alt="">
					</div>
					@endif
					@if ($listing->image_path4 != "")
					<div class="item">
					   	<img src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path4) }}" class="img-responsive" width="100%" alt="">
					</div>
					@endif
					@if ($listing->image_path5 != "")
					<div class="item">
					   	<img src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path5) }}" class="img-responsive" width="100%" alt="">
					</div>
					@endif
					@if ($listing->image_path6 != "")
					<div class="item">
					  	<img src="{{ asset('public/img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path6) }}" class="img-responsive" width="100%" alt="">
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
		              <li class="active"><a href="#reserve" data-toggle="tab"><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>BOOK</a></li>
		              <li><a href="#description" data-toggle="tab"><span class="glyphicon glyphicon-info-sign">&nbsp;</span>DESCRIPTION</a></li>
		              <li><a href="#policy" data-toggle="tab"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span>POLICY</a></li>
		              <li><a href="#contact" data-toggle="tab"><span class="glyphicon glyphicon-envelope">&nbsp;</span>CONTACT</a></li>
		              <li><a href="#map" data-toggle="tab"><span class="glyphicon glyphicon-map-marker">&nbsp;</span>MAP</a></li>
		            </ul>
		            <div class="tab-content">
			            <div class="tab-pane active" id="reserve">
			            	<div class="row">				            			            		
			            		<div class="form-horizontal">			            		
						          <div class="form-group">
						            <label for="inputEmail3" class="col-sm-3 control-label"><b>Price:</b></label>
						            <div class="col-sm-6">
							            <span class="rm-price">  
							            &#8358;{{ number_format($sublisting->price).$sublisting->price_measure}}
										</span>
						            </div>
						          </div>
						          <div class="form-group">
						            <label for="inputEmail3" class="col-sm-3 control-label"><b>Min. Booking time:</b></label>
						            <div class="col-sm-6">
						              	1 
						            </div>
						          </div>
						          <div class="form-group">
						            <label for="inputEmail3" class="col-sm-3 control-label"><b>Max. Guest:</b></label>
						            <div class="col-sm-6">
						              7
						            </div>
						          </div>
						          <div class="form-group">
						            <label for="inputEmail3" class="col-sm-3 control-label"><b>Qty Available:</b></label>
						            <div class="col-sm-6">
						             	8
						            </div>
						          </div>                             
						        </div>	

							    <form class="form-horizontal" method="get" action="{{ url('book/'.$listing->listing_id.'/'.$sublisting->id) }}">				
							    		<div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Check in:</label>
										    <div class="col-sm-6">
										      <input type="date" name="checkin" min="{{ date('Y-m-d--h:i') }}" required class="form-control" value="{{ date('Y-m-d--h:ia') }}" />
										       {{ $errors->first('checkin', '<p class="has-error">:message</p>') }}
										    </div>
										</div>		        		        								     					
										<div class="form-group">
								          <label for="qty-1" class="col-sm-2 control-label"> {{ $sublisting->price_measure }}(s):</label>
								          <div class="col-sm-6">
									          <input type="number" name="stay" min="1" required class="form-control" value="{{ old('stay') }}" />
									           {{ $errors->first('stay', '<p class="has-error">:message</p>') }}	   
								          </div>
								        </div>	
								        <div class="form-group">
								          <label for="qty-1" class="col-sm-2 control-label"> Quantity:</label>
								          <div class="col-sm-6">
									          <input type="number" name="qty" min="1" required class="form-control" value="{{ old('qty') }}" />
									           {{ $errors->first('qty', '<p class="has-error">:message</p>') }}	   
								          </div>
								        </div>		        		       
								        <div class="form-group">
										    <div class="col-sm-offset-2 col-sm-6">
										      <button type="submit" class="btn btn-large btn-primary" id="send"><span class="glyphicon glyphicon-bed">&nbsp;</span>Book</button>
										        <div class="btn-group dropup">
								                    <button data-toggle="dropdown" class="btn btn-large btn-info dropdown-toggle" type="button"><span class="glyphicon glyphicon-share-alt">&nbsp;</span>Share <span class="caret"></span></button>
								                    <ul role="menu" class="dropdown-menu">
								                        <li><a href=""><span class="glyphicon glyphicon-facebook">&nbsp;</span>Facebook</a></li>
								                        <li><a href=""><span class="glyphicon glyphicon-twitter">&nbsp;</span>Twitter</a></li>                            
								                    </ul>
								                </div><!-- /btn-group --> 
										    </div>
									  	</div>
						       							        							     	        		        		        
							    </form>	            		
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