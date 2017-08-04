@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12 login-form">
                <div class="col-md-3">              
                </div>
                <div class="col-md-6">
                    <div class="page-header text-center">
                        <h3 class="text-center">SIGN UP</h3>
                    </div> 
                    <form class="form-horizontal register" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @if(Session::has('alert'))
                        <div class="alert alert-success">
                            {{ Session::get('alert') }}
                            @php
                            Session::forget('alert');
                            @endphp
                        </div>
                        @endif
                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label class="control-label">Phone No*:</label>
                            <div class="input-group">
                                <span class="input-group-addon">+234</span>
                                <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="8000000000">
                            </div>
                            @if ($errors->has('telephone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telephone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="control-label">Username*:</label>
                            <input type="text" class="form-control input-lg" value="{{ old('username') }}" name="username" placeholder="6 - 12 characters" />
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label">Email*:</label>
                            <input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="email" />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>                                                                      
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label">Password*:</label>                                            
                            <input type="password" class="form-control password" name="password" placeholder="8 - 16 characters" /> 
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">              
                            <label class="control-label">Confirm Password*:</label>                 
                            <input type="password"  class="form-control password" name="password_confirmation" placeholder="Confirm Password" />                        
                        </div>  
                        <div class="form-group">                     
                            <p>
                                <input type="checkbox" name="terms" value="true" required>
                                    I accept the Terms of service
                            </p>             
                            <p class="has-error">{{ $errors->first('terms', ':message') }}</p>
                        </div> 
                       <!--  <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Captcha</label>

                            <div class="col-md-6">
                                {!! app('captcha')->display() !!}

                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->  
                        <div class="form-group form-group-lg">
                            <div class="control-label">
                               <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-user">&nbsp;</span>Sign Up</button>
                            </div>
                        </div>                        
                    </form>                 
                </div>
                <div class="col-md-3">              
                </div>
            </div>
        </div>
    </div>    
</div>

@stop