@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-12 login-form">
                <div class="col-md-4">              
                </div>
                <div class="col-md-4">
                    <div class="page-header text-center">
                        <h3 class="text-center">LOG IN</h3>
                    </div> 
                    @if ($status = Session::get('status'))
                        <div class="alert alert-info">
                            {{ $status }}
                        </div>
                    @endif
                    <form class="form-signin login" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}              
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>
                            <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif                              
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>                        
                            <input id="password" type="password" class="form-control input-lg" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif                        
                        </div>
                        <div class="form-group">                        
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>                        
                        </div>

                        <div class="form-group form-group-lg">
                            <div class="control-label">
                               <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-circle-arrow-up">&nbsp;</span>Log in</button>
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                          <div class="control-label text-center">
                            <a href="{{ route('password.request') }}">Forgot password?</a> 
                          </div>
                        </div>        
                    </form>                                     
                </div>
                <div class="col-md-4">              
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
