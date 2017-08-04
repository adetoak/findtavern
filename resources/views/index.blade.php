@extends('layouts.app')
@section('content')
<div class="jumbotron">
  	<div class="container">
     	<div class="row">
        	<div class="tabbable"> <!-- Only required for left/right tabs -->
	            <ul class="nav nav-tabs">
		            <li class="active">
		            	<a href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-home">&nbsp;</span>For Booking</a>
		            </li>
	              	<li>
	              		<a href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-home">&nbsp;</span>For Sale</a>
	              	</li>
	            </ul>
	            <p></p>
	            <div class="tab-content">
		            <div class="tab-pane active" id="tab1">
			            <div class="row">
		              	  	<form action="{{ url('destinations') }}" method="post">
		              	  	{{ csrf_field() }} 		              	  	
		              	  		<div class="searchcate">
					            	<div class="col-md-7">	                    	
					            		<div class="form-group">
				                          <input required class="form-control" name="destination" type="text" value="" placeholder="Search a City, Destination..." />
				                        </div>
					            	</div>
					            	<div class="col-md-3">
					            		<div class="form-group">
				                          <select name="searchcateg" class="form-control">
				                              <option value="all">All categories</option>
				                              <option value="Hotels">Hotels</option>
				                              <option value="Apartments">Apartments</option>
				                              <option value="Hostel">Hostel</option>
				                              <option value="Halls">Halls</option>
				                              <option value="Shops">Shops</option>
				                              <option value="Office">Office</option>
				                          </select>
				                        </div>
					            	</div>
					            	<div class="col-md-2">
					            		<div class="form-group">
				                          <button type="submit" name="submit" class="btn btn-primary">Search</button>
				                        </div>
					            	</div>	              	  			
		              	  		</div>              	  	                       
			            	</form>
			            </div>	             
		            </div>
		            <div class="tab-pane" id="tab2">
		              <div class="row">
		              	  	<form action="destinations" method="post"> 		              	  	
		              	  		<div class="searchcate">
					            	<div class="col-md-7">	                    	
					            		<div class="form-group">
				                          <input required class="form-control" name="destination" type="text" value="{{ old('destination') }}" placeholder="Search a City, Destination..." />
				                          {{ $errors->first('destination', '<p class="has-error">:message</p>') }} 
				                        </div>
					            	</div>
					            	<div class="col-md-3">
					            		<div class="form-group">
				                          <select name="searchcateg" class="form-control">
				                              <option value="all">All categories</option>
				                              <option value="Hotels">Hotels</option>
				                              <option value="Apartments">Apartments</option>
				                              <option value="Hostel">Hostel</option>
				                              <option value="Event Centres">Event Centres</option>
				                              <option value="Shops">Shops</option>
				                              <option value="Office Space">Office Space</option>
				                          </select>
				                        </div>
					            	</div>
					            	<div class="col-md-2">
					            		<div class="form-group">
				                          <button type="submit" name="submit" class="btn btn-primary">Search</button>
				                        </div>
					            	</div>	              	  			
		              	  		</div>              	  	                       
			            	</form>
			            </div>
		            </div>
	         	</div>
        	</div>
        </div>
    </div>    
</div>
<div class="featured-listings">
	<div class="container">
		<div class="row">
			<div class="works-heading">
				<div class="row text-center">
					<h3>FEATURED LISTINGS</h3>
					<div class="arrow-down">
						<span class="glyphicon glyphicon-chevron-down" aria-hidden="true">&nbsp;</span>				
					</div>
				</div>
			</div>
			<div class="tabbable"> <!-- Only required for left/right tabs -->
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab5" data-toggle="tab">FOR BOOKING</a></li>
	              <li><a href="#tab6" data-toggle="tab">FOR SALE</a></li>
	            </ul>
	            <div class="tab-content">
		            <div class="tab-pane active" id="tab5">		            	
						<div class="row featured">												
							<div class="col-md-6">
								<div class="media">
								    <a class="pull-left" href="{{ url('viewlisting/') }}">
								    <img src="{{ asset('public/img/estate.JPG') }}" alt="listing image" class="media-object img-responsive">
								    </a>
								    <div class="media-body">						   
								  		<p><b>Name: </b>Adetoak </p>
										<p><b>Address: </b>Ibadan</p>
										<p><b>Category: </b>Hotel</p>				   				 
										<p><b>Min. Room Price: </b>&#8358;30,000 </p>				   				 
								    <!-- Nested media object -->				    
								    </div>
								</div>
							</div>	
							<div class="col-md-6">
								<div class="media">
								    <a class="pull-left" href="{{ url('viewlisting/') }}">
								    <img src="{{ asset('public/img/estate_2.JPG') }}" alt="listing image" class="media-object img-responsive">
								    </a>
								    <div class="media-body">						   
								  		<p><b>Name: </b>Adetoak </p>
										<p><b>Address: </b>Parakin</p>
										<p><b>Category: </b>Hotel</p>				   				 
										<p><b>Min. Room Price: </b>&#8358;30,000 </p>				   				 
								    <!-- Nested media object -->				    
								    </div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
								    <a class="pull-left" href="{{ url('viewlisting/') }}">
								    <img src="{{ asset('public/img/estate3.JPG') }}" alt="listing image" class="media-object img-responsive">
								    </a>
								    <div class="media-body">						   
								  		<p><b>Name: </b>Adetoak </p>
										<p><b>Address: </b>Parakin</p>
										<p><b>Category: </b>Hotel</p>				   				 
										<p><b>Min. Room Price: </b>&#8358;30,000 </p>				   				 
								    <!-- Nested media object -->				    
								    </div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
								    <a class="pull-left" href="{{ url('viewlisting/') }}">
								    <img src="{{ asset('public/img/estate.JPG') }}" alt="listing image" class="media-object img-responsive">
								    </a>
								    <div class="media-body">						   
								  		<p><b>Name: </b>Adetoak </p>
										<p><b>Address: </b>Parakin</p>
										<p><b>Category: </b>Hotel</p>				   				 
										<p><b>Min. Room Price: </b>&#8358;30,000 </p>				   				 
								    <!-- Nested media object -->				    
								    </div>
								</div>
							</div>			
						</div>						
		            </div>
		            	
		            <div class="tab-pane" id="tab6">
		                <div class="row featured">												
							<div class="col-md-6">
								<div class="media">
								    <a class="pull-left" href="{{ url('viewlisting/') }}">
								    <img src="{{ asset('public/img/estate.JPG') }}" alt="listing image" class="media-object img-responsive">
								    </a>
								    <div class="media-body">						   
								  		<p><b>Name: </b>Xela </p>
										<p><b>Address: </b>Parakin</p>
										<p><b>Category: </b>Hotel</p>				   				 
										<p><b>Min. Room Price: </b>&#8358;30,000 </p>				   				 
								    <!-- Nested media object -->				    
								    </div>
								</div>
							</div>	
							<div class="col-md-6">
								<div class="media">
								    <a class="pull-left" href="{{ url('viewlisting/') }}">
								    <img src="{{ asset('public/img/estate_2.JPG') }}" alt="listing image" class="media-object img-responsive">
								    </a>
								    <div class="media-body">						   
								  		<p><b>Name: </b>Xela </p>
										<p><b>Address: </b>Parakin</p>
										<p><b>Category: </b>Hotel</p>				   				 
										<p><b>Min. Room Price: </b>&#8358;30,000 </p>				   				 
								    <!-- Nested media object -->				    
								    </div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
								    <a class="pull-left" href="{{ url('viewlisting/') }}">
								    <img src="{{ asset('public/img/estate3.JPG') }}" alt="listing image" class="media-object img-responsive">
								    </a>
								    <div class="media-body">						   
								  		<p><b>Name: </b>Adetoak </p>
										<p><b>Address: </b>Ibadan</p>
										<p><b>Category: </b>Hotel</p>				   				 
										<p><b>Min. Room Price: </b>&#8358;30,000 </p>				   	
										<!-- Nested media object -->				    
								    </div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
								    <a class="pull-left" href="{{ url('viewlisting/') }}">
								    <img src="{{ asset('public/img/estate.JPG') }}" alt="listing image" class="media-object img-responsive">
								    </a>
								    <div class="media-body">						   
								  		<p><b>Name: </b>Xela </p>
										<p><b>Address: </b>Ibadan</p>
										<p><b>Category: </b>Hotel</p>				   				 
										<p><b>Min. Room Price: </b>&#8358;30,000 </p>				   	
										<!-- Nested media object -->				    
								    </div>
								</div>
							</div>			
						</div>
		            </div>
	          </div>
	        </div>	        
        </div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="how-it-works">
			<div class="works-heading">
				<div class="row text-center">
					<h3>HOW IT WORKS</h3>
					<div class="arrow-down">
						<span class="glyphicon glyphicon-chevron-down" aria-hidden="true">&nbsp;</span>						
					</div>
				</div>
			</div>
			<div class="tabbable"> <!-- Only required for left/right tabs -->
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab3" data-toggle="tab">FOR  SEEKERS</a></li>
	              <li><a href="#tab4" data-toggle="tab">FOR PROVIDERS</a></li>
	            </ul>
	            <div class="tab-content">
		            <div class="tab-pane active" id="tab3">		            	
						 <div class="row">												
							<div class="col-md-4">
								<div class="box text-center">
									<span class="glyphicon glyphicon-search icon-sprite">&nbsp;</span>
									<p>
							          With Findtavern easy user interface and wide range of Hotels, Event Centres, Apartments rooms listings, buyers or bookers can search through lists of Hotels, Event Centres, Apartments rooms with each full details and high quality pictures which helps buyers and bookers to have a comprehensive understanding of what they are searching for. <a href="{{ url('register') }}">Sign up now!</a>
							        </p>                 				
								</div>					
							</div>
							<div class="col-md-4">
								<div class="box text-center">
									<span class="glyphicon glyphicon-th-list icon-sprite">&nbsp;</span>
									<p>
							          Browse through multiple listings from wide range of world class Hotels, Event Centres, Apartments at competitive prices offered for booking or sale,  and contact numerous Hotels, Event Centres, Apartments Managers or owners from the comfort of your home. Findtavern.com saves you time and money either you are looking to book or buy anywhere in Nigeria. 
							        </p>                					
								</div>					
							</div>												
							<div class="col-md-4">
								<div class="box text-center">
									<span class="glyphicon glyphicon-bed icon-sprite">&nbsp;</span>
									<p>
								      Once you book the Hotels, Event Centres or Apartments of your choice, Our objective is to make getting the Hotel, Event Centres or Apartments for you easier and this will be done by contacting the respective Hotel, Event Centres or Apartments Manager/Owner and also offering quality support via email, Telephone (+2348096792101).
								    </p>                				  	
								</div>					
							</div>							
						</div>						
		            </div>
		            <div class="tab-pane" id="tab4">
		                <div class="row">												
							<div class="col-md-4">
								<div class="box text-center">
									<span class="glyphicon glyphicon-search icon-sprite">&nbsp;</span>
									<p>
							         Contact an agent and register for an account on our website. <a href="{{ route('register') }}">Sign up now!</a>
							        </p>                 				
								</div>					
							</div>
							<div class="col-md-4">
								<div class="box text-center">
									<span class="glyphicon glyphicon-btc icon-sprite">&nbsp;</span>
									<p>
							          Fill up the form with the correct property details and make sure you select the type of listing and upload the images of the listing. 
							        </p>                					
								</div>					
							</div>												
							<div class="col-md-4">
								<div class="box text-center">
									<span class="glyphicon glyphicon-ok-circle icon-sprite">&nbsp;</span>
									<p>
								      You're all done and the property listing will be reviewed and either approved or declined.<a href="{{ url('new-lisitng') }}">Offer Listing!</a>
								    </p>                				  	
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