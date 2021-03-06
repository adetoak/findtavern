@extends('layouts.app')
@section('content')
<div class="container">
	@include('manage._partials.sidebar')
	<div class="col-lg-9 main">		
		<div class="panel panel default">
  				<div class="page-header">
			        <h2>New Sub-Listing<small class="pull-right">{{date('D d M, Y -- h:i')}}</small></h2>
			    </div>
  				<div class="panel-body">
  					<form method="post" action="{{ url('manage/new-sub-listing/'.$listing->listing_id) }}" enctype="multipart/form-data">
  					{{ csrf_field() }}
  					@if (Session::get('success_msg'))
  						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							  {{  Session::get('success_msg') }}
						</div>
					@elseif (Session::get('error_msg')) 							  
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							  {{  Session::get('error_msg') }}
						</div>
					@endif
  						<fieldset>
  							<legend>Listing Information</legend>
  							@include('manage._partials.listingname-media')
  						</fieldset>
  						<input type="hidden" name="listingid" value="{{ $listing->listing_id }}">
  						@include('manage._partials.new-sub-listing-form')
  						<div class="form-group">
			              <button type="submit" class="btn btn-primary" name="create">Create Sub-Listing</button>
			            </div>
  					</form>                           
  				</div>  				
  		</div>
	</div>
</div>
@stop