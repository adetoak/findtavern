@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-lg-3 sidebar">
		<div class="row">
			<div class="box1">			
			    <h3>Your Search Details</h3>
			    <div>
			  		<form action="{{ url('destinations') }}" method="post">			          	
			          		<div class="form-group">
			            		<label class="control-label">Search a City, Destination</label>
			            		<input required class="form-control" name="destination" type="text" value="{{ old('destination') }}" placeholder="Enter a Keyword..." />
			            		{{ $errors->first('destination', '<p class="has-error">:message</p>') }} 
			          		</div>
				         	<div class="form-group">
								<select name="searchcateg" value="{{ old('searchcateg') }}" id="search-categ">
							  	<option value="all">All categories</option>
			                    <option value="Hotels">Hotels</option>
			                    <option value="Apartments">Apartments</option>
			                    <option value="Hostel">Hostel</option>
			                    <option value="Event Centres">Event Centres</option>
			                    <option value="Shops">Shops</option>
			                    <option value="Office Space">Office Space</option>
						      </select>
						      {{ $errors->first('searchcateg', '<p class="has-error">:message</p>') }} 
					  	  	</div>
					        <div class="form-group">
					           <button type="submit" name="submit" class="btn btn-primary">Search</button>
					        </div>
			    	</form>
			    </div>
			  	<div id="grid-row-2">
			  		<span class="glyphicon glyphicon-ok-sign">&nbsp;</span>Findtavern Booking protection
			  	</div>
			</div>
		</div>
	@include('_partials.sidebar')
	</div>
	<div class="col-lg-9 main">		
		<div class="panel panel-default">        
	        <div class="panel-heading">
	          <div class="panel-title">	            
	            <h4>{{ $count }} result(s) found for "<b>{{ $search }}</b>" in {{ $categ }}</h4>	            
	          </div>
	        </div>
	        <div class="panel-body">
				<table class="table table-hover table-responsive">				 
				  <tbody>
				  @foreach($searchss as $searchs)
				    <tr>
				        <td class="text-left">
					        <div class="media">
							  <a class="pull-left" href="{{ url('viewlisting/'.$searchs->listing_id) }}">
							    <img src="{{ asset('public/img/listings/listing-'.$searchs->listing_id.'/listingimg/'.$searchs->image_path) }}" alt="listing image" class="media-object img-responsive">
							  </a>
							  <div class="media-body">						   
							  		<p><b>Name: </b>{{ $searchs->title }} </p>
									<p><b>Address: </b>{{ $searchs->address }}</p>
									<p><b>Category: </b>{{ $searchs->category }}</p>				   				 
									<p><b>Min. Sub-Listing Price: </b>&#8358;{{ number_format($searchs->min_price) }} </p>				   				 
							    <!-- Nested media object -->				    
							  </div>
							</div>
						</td>				    
				      <td><a href="{{ url('viewlisting/'.$searchs->listing_id) }}" class="btn btn-primary">View Details</a></td>
				    </tr>
				  @endforeach
				  </tbody>
				</table>


			</div>
		</div>
	</div>
</div>
@stop