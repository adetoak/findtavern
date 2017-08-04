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
		  		              <a class="btn btn-primary navbar-btn" href="{{ url('manage/new-listing') }}">New Listing</a>
		                   <!--  <a class="btn btn-info navbar-btn" href="../admin/mail">Students</a>
		  		              <a class="btn btn-info navbar-btn" href="../admin/mail">Vsit</a>
		  		              <a class="btn btn-info navbar-btn" href="../admin/mail">Canada</a>  -->                                                     
		                  </div>
		                  <div class="col-md-6">
				                <form class="navbar-form pull-right" action="" role="search">
				                  <div class="form-group">
				                     <div class="input-group">
		                            <input type="text" class="form-control" name="search" placeholder="Listing ID/title...">
		                            <span class="input-group-btn">
		                              <button class="btn btn-info" type="submit">Search!</button>
		                            </span>
		                          </div><!-- /input-group -->
				                  </div>
				                </form>                    
		                  </div>
		                
		            </div> 
  					<div class="table-responsive">
			            <table class="table table-striped">
			              <thead>
			                <tr>
			                  <th class="text-center">Listing Image</th>
			                  <th>Date Created</th>
			                  <th class="text-center">Listing ID</th>
			                  <th class="text-center">Listing Title</th>
			                  <th class="text-center">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			              @foreach ($listings as $listing)
			                <tr>
			                  <td class="text-center"><img src="{{ asset('public/img/listings/listing-'.$listing->listing_id.'/listingimg/'.$listing->image_path) }}" alt="listing image" class="img-polaroid img-responsive"></td>
			                  <td class="text-left">{{ $listing->created_at }}</td>
			                  <td class="text-center">{{ $listing->listing_id }}</td>
			                  <td class="text-center">{{ $listing->title}}</td>
			                  <td class="text-center">
			                     <div class="btn-group">
			                      <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button">Action <span class="caret"></span></button>
			                      <ul role="menu" class="dropdown-menu">
			                        <li><a href="{{ url('manage/listing-details/'.$listing->listing_id) }}">View details</a></li>
			                        <li><a href="{{ url('manage/new-sub-listing/'.$listing->listing_id) }}">New sub-listing</a></li>
			                        <li><a href="{{ url('manage/edit-listing') }}">Edit Listing</a></li>        
			                      </ul>
			                    </div><!-- /btn-group --> 
			                  </td>
			                </tr> 
			                @endforeach                                        		            		             
			              </tbody>			              
			            </table>   
			             {{ $listings->links() }}            
        			 </div>                            
  				</div>  				
  		</div>
	</div>
</div>
@stop