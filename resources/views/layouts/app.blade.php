<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ ('http://fonts.googleapis.com/css?family=Raleway') }}" rel='stylesheet' type='text/css'>    
  
  <link rel="shortcut icon" href="{{ asset('public/img/favicon.ico') }}" />

  <title>{{ config('app.name', 'Findtavern.com - Smarter Booking, Comfort Living') }}</title>

  <!-- Styles -->
  <!-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">

  <!-- Scripts -->
  <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>  
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>   
</head>
<body>
  <div class="heading">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                 <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Findtavern') }}
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())                        
                        <li>
                           <a href="#"><span class="glyphicon glyphicon-question-sign">&nbsp;</span> HELP</a>
                        </li>       
                        <li>
                           <a href="{{ url('#') }}"><span class="glyphicon glyphicon-envelope">&nbsp;</span>CONTACT US</a>
                        </li>                             
                        <li>
                           <a href="{{ url('manage/new-listing') }}"><span class="glyphicon glyphicon-plus">&nbsp;</span> OFFER LISTING</a>
                        </li>
                        <li>
                           <a href="{{ route('register') }}"><span class="glyphicon glyphicon-user">&nbsp;</span>SIGN UP</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}"> <span class="glyphicon glyphicon-circle-arrow-up">&nbsp;</span>SIGN IN</a>
                        </li>
                      @else
                        <li>
                           <a href="#"><span class="glyphicon glyphicon-question-sign">&nbsp;</span> HELP</a>
                        </li>       
                        <li>
                           <a href="{{ url('#') }}"><span class="glyphicon glyphicon-envelope">&nbsp;</span>CONTACT US</a>
                        </li>                             
                        <li>
                           <a href="{{ url('manage/new-listing') }}"><span class="glyphicon glyphicon-plus">&nbsp;</span> OFFER LISTING</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                      @endif
                  </ul>                 
              </div>
            </div>
          </nav> 
        </div> 
      </div>  
   </div>  
  <div class="wrapper">    
    @yield('content')
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-wrap">          
          <div class="col-md-3">            
            <div class="subscribe-section">
              <h5>Subscribe to our Newsletter:</h5>          
              <form method="post" action="">
                <div class="form-group">
                  <label class="control-label">Your Email Adress:</label>
                  <input type="email" required class="form-control" id="newsletter" name="newsletter" placehoder="Your Email Adress..." />
                </div>
                <div class="form-group">
                  <button type="submit" name="subscribe" id="submit" class="btn btn-default submit"><span class="glyphicon glyphicon-bell">&nbsp;</span>Subscribe</button>
                </div>
              </form>
              <p>Receive deals on Hotels, Event Centres / Apartments via e-mail </p>                 
            </div>          
          </div>
        <div class="col-md-3">            
          <div class="stayconnected-section">
            <h5>Stay Connected </h5>
              <ul>
                <li class="facebook"><a class="facebook" href="{{ url('https://www.facebook.com/findtavern') }}"><span class="icon-sprite sprite-fb">&nbsp;</span>Facebook</a></li>
                <li class="twitter"><a class="twitter" href="{{ url('https://www.twitter.com/findtavern') }}"><span class="icon-sprite sprite-twitter">&nbsp;</span>Twitter</a></li>
                <li class="youtube"><a class="youtube" href="{{ url('https://www.youtube.com/findtavern') }}"><span class="icon-sprite sprite-youtube">&nbsp;</span>Youtube</a></li>
                <li class="gplus"><a class="gplus" href="{{ url('https://www.googleplus.com/findtavern') }}"><span class="icon-sprite sprite-gplus">&nbsp;</span>Google +</a></li>
                <li class="gplus"><a class="gplus" href="{{ url('https://www.instagram.com/findtavern') }}"><span class="icon-sprite sprite-instagram">&nbsp;</span>Instagram</a></li>
              </ul>
            <h5>Our Brand </h5>
              <ul>
                <li><a href="#"><span class="glyphicon glyphicon-comment">&nbsp;</span>Tell Us What You Think</a></li>
              </ul>                   
          </div>          
        </div>
        <div class="col-md-3">          
          <div class="howtouse-section">
              <h5>How to Use</h5>
              <ul>
                <li><a href="{{ url('register#create-account') }}"><span class="glyphicon glyphicon-user">&nbsp;</span>Create an Account</a></li>
                <li><a href="#newsletter"><span class="glyphicon glyphicon-bell">&nbsp;</span>Subscribe for Newsleter</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-filter">&nbsp;</span>Booking Options</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-briefcase">&nbsp;</span>Making Payments</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-lock">&nbsp;</span>Booking Protection</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-book">&nbsp;</span>New User Guide</a></li>
              </ul>                       
          </div>          
        </div>
        <div class="col-md-3">          
          <div class="customerservice-section">
              <h5>Customer Service </h5>
              <ul>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Frequently Asked Questions</a></li>                
                <li><a href="#">Affiliate Program</a></li>
                <li><a href="#">Transaction Service Agreement</a></li>                               
              </ul>           
               <h5>About Platform Provider </h5>
              <ul>
                <li><a href="#" style="font-size: 0.87em"><span class="glyphicon glyphicon-tag">&nbsp;</span>Adetoak Systems Technologies</a></li>
                <li><a href="#" style="font-size: 0.87em"><span class="glyphicon glyphicon-globe">&nbsp;</span>Visit Website</a></li>
              </ul>
          </div>          
        </div>        
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          
        <div class="note-section">
          <p>
             Getting Hotels, Event Centres, Apartments rooms in Nigeria has never been as convenient as with <span class="bold">Findtavern.com.</span> Enter your Destination and we provide you with available Hotels, Event Centres, Apartments rooms from any destination of your choice in Nigeria from which you can book online. The great news is that you can use your Credit card to pay which is backed by <a href="#" class="buyerprotection">Booking Protection</a> and you can also pay on arrival, ounce you arrive at the destination. Now, the hardest part is that you are going to be the choosing one, we have an amazing amount of classic Hotels, Event Centres, Apartments rooms for your pleasure.      
          </p>
        </div>          
        </div>
      </div>
      <div class="row">
      <div class="col-md-12">
        
        <div class="footer-links">
          <ul>
            <li><a href="#"> Terms of Service</a></li>
            <li><a href="#">Report Copyright Infringement</a></li>
            <li><a href="#">Report Security Issue</a></li>
            <li><a href="#">Privacy Statement</a></li>
            <li><a href="#">Accessibility</a></li>
            <li><a href="#">Sitemap</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
          <div class="copyright">
            <small>&copy; {{ date('Y') }} Adetoak Systems Technologies.</small>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <div class="modal fade" id = "editdestination" role = "dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Change your Destination</h4>
          </div>
            <form method="post" action="{{ url('destinations') }}">
              <div class="modal-body">                 
                <div class="form-group">
                  <label class="control-label">Enter a Keyword:</label>
                  <div class="form-group">
                    <input required class="form-control" name="destination" type="text" value="" placeholder="Search a City, Destination..." />
                  </div>
                </div> 
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
              <div class="modal-footer">
                  <a class="btn btn-default" data-dismiss="modal">Close</a>
                  <button class="btn btn-primary" type="submit">Search</button>
              </div>
            </form>
        </div>
      </div>
  </div>
<!-- Scripts -->

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{ asset('public/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
</body>
</html>
