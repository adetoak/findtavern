@extends('layouts.app')
@section('content')
<div class="container">
	@include('manage._partials.sidebar')
	<div class="col-lg-9 main">		
		<div class="panel panel default">
  				<div class="page-header">
			        <h2>Dashboard<small class="pull-right">{{date('D d M, Y -- h:i')}}</small></h2>
			    </div>
  				<div class="panel-body">
  					<div class="row">
			            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			                <div class="tile">
			                  <img src="{{ asset('public/img/user.png') }}" alt="User" class="tile-image big-illustration">
			                  <h3 class="tile-title">Registration</h3>
			                  <p>Register a new User.</p>
			                  <a class="btn btn-primary btn-large btn-block" href="{{ url('admin/tools/users') }}">Users</a>
			                </div>
			            </div>
			            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			                <div class="tile">
			                  <img src="{{ asset('public/img/archive.png') }}" alt="Logout" class="tile-image">
			                  <h3 class="tile-title">Upload file</h3>
			                  <p>Save files to archive. </p>
			                  <a class="btn btn-primary btn-large btn-block" href="{{ url('admin/tools/uploadfile') }}">Upload file</a>
			                </div>
			            </div>

			            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			                <div class="tile">                  
			                  <img src="{{ asset('public/img/payment.png') }}" alt="Help" class="tile-image">
			                  <h3 class="tile-title">Payments</h3>
			                  <p>Payments history.</p>
			                  <a class="btn btn-primary btn-large btn-block" href="{{ url('admin/transactions') }}">All payments</a>
			                </div>

			            </div>              
			            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			                <div class="tile">
			                  <img src="{{ asset('public/img/editprofile.png') }}" alt="Edit-Profile" class="tile-image">
			                  <h3 class="tile-title">Profile</h3>
			                  <p>Edit &amp; Update Profile</p>
			                  <a class="btn btn-primary btn-large btn-block" href="{{ url('#') }}">Account Settings</a>
			                </div>
			            </div>
            		</div>                            
  				</div>  				
  		</div>
	</div>
</div>
@stop