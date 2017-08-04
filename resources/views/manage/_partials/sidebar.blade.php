<div class="col-lg-3 sidebar">
  <div class="row">
    <div class="list-group">
    </div>    
  </div>
    <div class="row">                  
      <div class="list-group">
        <div class="panel-heading list-group-item active">
          <h3 class="panel-title list-group-item-heading">SHORTCUTS</h3>
        </div>
          <a href="{{ url('manage/dashboard') }}" class="list-group-item">
           <span class="glyphicon glyphicon-home">&nbsp;</span> Dashboard
          </a>
          <a href="{{ url('manage/my-bookings') }}" class="list-group-item">
           <span class="glyphicon glyphicon-bed">&nbsp;</span> My Bookings
          </a>          
          <a href="{{ url('manage/my-listings')}}" data-toggle= "modal" class="list-group-item">
           <span class="glyphicon glyphicon-th-list">&nbsp;</span> My Listings
          </a>
          <a href="{{ url('manage/new-listing') }}" class="list-group-item">
            <span class="glyphicon glyphicon-plus">&nbsp;</span> Offer Listing
          </a>
          <a href="{{ url('#') }}" class="list-group-item">
            <span class="glyphicon glyphicon-envelope">&nbsp;</span> Messages
          </a>
          <a href="{{ url('#') }}" class="list-group-item stable">
            <span class="glyphicon glyphicon-tags">&nbsp;</span> Feedbacks
          </a>
          <a href="{{ url('logout') }}" class="list-group-item">
           <span class="glyphicon glyphicon-off">&nbsp;</span> Logout
          </a>
      </div>
          </div>
    <div class="row">
      <div class="list-group">
        <div class="panel-heading list-group-item active">
          <h3 class="panel-title list-group-item-heading">CUSTOMER SUPPORT <span class="glyphicon glyphicon-question-sign">&nbsp;</span></h3>
        </div>
        <span class="list-group-item">
          <a href="#">Click for help &gt;&gt;</a>                        
        </span>
      </div>
    </div>
</div>