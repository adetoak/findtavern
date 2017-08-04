<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Findtavern.com - Invoice-{{ $invoice->transaction_id }} </title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
{{ HTML::style('css/bootstrap.min.css') }}
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
<style type="text/css">
  @charset "utf-8";
body{
  margin:0px;
  padding:0px;
  background-color:#F5F5F5;
}

#wrapper{
  margin:10px auto;
  width: 700px;
  padding:20px;
  border: solid thin #AAA;
  border-radius:5px;
  background-color:#FFF;
  overflow: hidden;  
}
#row_1{
  overflow:hidden;
}
#col_1{ 
  background-image: url(../img/FT8.png);
  background-repeat: no-repeat;  
  height: 100px;
}
#col_2{
  height:100px; 
}
#row_2{
  padding:10px 15px;
  margin:10px 0px;
  font-family:Arial, Helvetica, sans-serif;
  line-height:20px;
  font-size:1em;
  color:#fff;
  text-align:center;
  background-color: #F08080;
}
#amount{  
  width:20%;
}
td dl{
  margin: 0px;
  padding:0px;
  font-family:"Raleway", Helvetica, sans-serif;
}
td dl dt{
  font-weight:800;
  margin-left:0px;
}
td dl dd{
  margin-left:0px;
  line-height:20px;
}
#row_4{
  margin:10px 0px;
}
#row_4 dl{
  margin: 0px;
  padding:0px;
  font-family:"Raleway", Helvetica, sans-serif;
}
#row_4 dl dt{
  font-size:0.89em;
  font-weight:800;
  margin-left:0px;
}
#row_4 dl dd{
  margin-left:0px;
  line-height:20px;
}
#row_5 .tabletwo{
  border-collapse:collapse;
  font-family:Arial, Helvetica, sans-serif;
}
#row_5 .tabletwo #description{
  width:70%;
}
.media-object{
  width: 250px;
  height:200px;  
}
#row_5 .tabletwo .right{
  text-align:right;
  font-weight:700
}
#row_5 .tabletwo .center{
  text-align:center;
  font-weight:700;
}
</style>
</head>
<body>
  <div id="wrapper">    
      <div class="row">      
          <div class="col-md-6" id="col_1">
          </div>
          <div class="col-md-6 text-center" id="col_2">
              Unpaid
          </div>        
      </div>    
      <div id="row_2">
      If you want to make payment directly to our bank account by visiting a bank physically or via online transfer, do ensure to send a mail to billing@findtavern.com stating the details of your payment.
      </div>
        <div id="row_3">
          <table class="table table-bordered table-condensed">    	 
            <tr>
              <td valign="top">
                <dl>
                  <dt>Invoiced To:</dt>
                    <dd><b>Name:</b> {{ $invoice->customer_fname.' '.$invoice->customer_lname}}</dd>
                 	  <dd><b>Contact Address:</b> {{ $invoice->customer_residency}}</dd>    
                </dl>
                <dl>
                  <dt><h3><b>Transaction Id:</b> #{{ $invoice->transaction_id }} </h3></dt>
                    <dd><b>Transaction Date:</b> {{ $invoice->created_at }} </dd>
                    <dd><b>Checkout:</b> {{ $invoice->checkout }}</dd>
                </dl>
              </td>
              <td valign="top">
               <dl> 
                  <dt>Pay To:</dt>
                    <dd>Account Name: Adetoak Systems Technologies</dd>
                    <dd>Account No: 0037548134</dd>
                    <dd>Bank: Guaranty Trust Bank</dd>
                    <dd>OR</dd>
                    <dd>Account No: 0040813250</dd>
                    <dd>Bank: Diamond Bank</dd>
                    <dd>TIN: 1290873-0987</dd>
                </dl>
              </td>
            </tr>  
          </table>
        </div>
          <div id="row_4">
         
          </div>
            <div id="row_5">
              <table class="table table-bordered">
                <colgroup>
                  <col id="description" />
                  <col id="amount" />         
                </colgroup>
                <thead>
                  <tr>
                    <th scope="col" class="warning text-center">Description</th>
                    <th scope="col" class="warning text-center">Amount(&#8358;)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="media">
                          <a class="pull-left" href="#">
                          <img class="media-object" src="{{ asset('img/listings/listing-'.$sublisting->listing_id.'/sublistingimg/'.$sublisting->title.'/'.$sublisting->image_path) }}">
                        </a>
                      <div class="media-body">
                          <h4 class="media-heading">{{ $listing->title }}</h4>
                        <p><b>LIsting Address:</b> {{ $listing->address }}</p>
                        <p><b>Sub LIsting Title:</b> {{ $sublisting->title }}</p>
                        <p><b>Price:</b> &#8358;{{ number_format($sublisting->price).$sublisting->price_measure }}</p>
                        <p><b>Stay:</b> {{ $invoice->booking_duration }}</p>
                        <p><b>Quantity Booked:</b> {{ $invoice->booked_qty }}</p>                                                                      
                          <!-- Nested media object -->            
                      </div>
                    </div>
                    </td>
                    <td class="text-center">.00</td>
                  </tr>        
                  <tr>
                    <td class="text-right">VAT:</td>
                    <td class="text-center">.00</td>
                  </tr>
                  <tr>
                    <td class="text-right">Findtavern.com Service Charge:</td>
                    <td class="text-center">.00</td>
                  </tr>
                  <tr>
                    <td class="text-right">Credit:</td>
                    <td class="text-center">.00</td>
                  </tr>
                  <tr>
                    <td class="text-right"><b>Total:</b></td>
                    <td class="text-center"><b>.00</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <a href="{{ url('/') }}">Back to Home</a> | <a href="{{ url('manage/my-bookings') }}">My Bookings</a> | <a href="{{ url('manage/dashboard') }}">My Dashboard</a>
          </div>
        </div>
      </div>
  
</body>
</html>