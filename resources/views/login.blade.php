@extends('_layouts.headfoot')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 login-form">
			<div class="col-md-4">				
			</div>
			<div class="col-md-4">
				<div class="page-header text-center">
					<h3 class="text-center">LOG IN</h3>
				 </div> 
			    <form class="form-signin" method="post" action="login">
			    	{{ csrf_field() }} 		
			    	@if ($message = Session::get('success'))
					    <div class="alert alert-success">
					        <p>{{ $message }}</p>
					    </div>
					@endif

					@if ($message = Session::get('warning'))
					    <div class="alert alert-warning">
					        <p>{{ $message }}</p>
					    </div>
					@endif		    
					@if (Session::get('login_error')) 							  
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
						    {{  Session::get('login_error') }}
						</div>
					@endif  		      	       
			        <div class="form-group text-left">
			          <label class="control-label">Username*:</label>
			          <input class="form-control input-lg" name="username" type="text" value="{{ old('username') }}" placeholder="Username">
			          <p class="has-error">{{ $errors->first('username', ':message') }}            </p>
			        </div>
			        <div class="form-group text-left">
			          <label class="control-label">Password*:</label>
			          <input type="password" class="form-control input-lg" name="password" placeholder="Password" />
			          <p class="has-error">{{ $errors->first('password', ':message') }}</p>
			        </div>
			        <div class="form-group form-group-lg">
				        <div class="control-label">
				           <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-circle-arrow-up">&nbsp;</span>Log in</button>
				        </div>
			        </div>
			        <div class="form-group form-group-lg">
			          <div class="control-label text-center">
			            <a href="{{ url('forgot-password') }}">Forgot password?</a> 
			          </div>
			        </div>        
			    </form>	
			    <div class="form-group form-group-lg">
				    <div class="control-label">
				        <a href="{{ url('signup') }}" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-user">&nbsp;</span>Sign Up</a>
				    </div>
			    </div>		
				
			</div>
			<div class="col-md-4">				
			</div>
		</div>
	</div>
</div>

@stop