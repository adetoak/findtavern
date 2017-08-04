<fieldset>
  <legend>Listing Information</legend>  
   <input type="hidden" name="listingid" value="{{ str_shuffle('0123456789') }}"  />      
    <div class="form-group">
      <label class="control-label">Listing Title*:</label>              
      <input name="listingtitle" value="{{ old('listingtitle') }}" type="text" placeholder="Listing title" class="form-control" autofocus required />
      {{ $errors->first('listingtitle', '<p class="has-error">:message</p>') }}  
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label">Listing Type*:</label>
          <select name="listingtype" required="required" value="{{ old('listingtype') }}" class="form-control">
            <option value="-1">--Select Type--</option>
            <option value="booking">For Booking</option>
            <option value="sale">For Sale</option>                  
          </select>
          {{ $errors->first('listingtype', '<p class="has-error">:message</p>') }}  
        </div>  
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label">Category*:</label>
          <select name="listingcateg" required="required" value="{{ old('listingcateg') }}" class="form-control">
            <option value="-1">--Select category--</option>
            <option value="Hotels">Hotels</option>
            <option value="Apartments">Apartments</option>
            <option value="Hostel">Hostel</option>
            <option value="Halls/Events Centre">Halls/Events Centre</option>
            <option value="Shops">Shops</option>
            <option value="Office">Office</option>
          </select>
          {{ $errors->first('listingcateg', '<p class="has-error">:message</p>') }}  
        </div>                                      
      </div>
    </div>
    <div class="form-group">
      <label class="control-label">Description*:</label>                        
      <textarea name="description" type="text" placeholder="Give a brief description of listing" class="form-control">
      {{ old('description') }}</textarea>
      {{ $errors->first('description', '<p class="has-error">:message</p>') }}  
    </div>  
    <div class="form-group">
      <label class="control-label">Price(&#8358;):*(e.g 10000)</label>            
      <input name="minprice" value="{{ old('minprice') }}" type="number" placeholder="1000000" class="form-control"  />
      {{ $errors->first('minprice', '<p class="has-error">:message</p>') }}  
    </div>
    <div class="form-group">
      <label class="control-label">Location*:</label>             
    <div class="form-inline">                                          
      <input type="text" readonly="readonly" class="form-control" name="listingcountry" value="Nigeria" /> 
      {{ $errors->first('listingcountry', '<p class="has-error">:message</p>') }}         
                 
      <select name="listingstate" required value="{{ old('listingstate')}}" class="form-control">
          <option value="0">--Choose State--</option>
          <option value="Abia">Abia</option>
          <option value="Abuja (FCT)">Abuja (FCT)</option>
          <option value="Adamawa">Adamawa</option>
          <option value="Akwa Ibom">Akwa Ibom</option>
          <option value="Anambra">Anambra</option>
          <option value="Bauchi">Bauchi</option>
          <option value="Bayelsa">Bayelsa</option>
          <option value="Benue">Benue</option>
          <option value="Borno">Borno</option>
          <option value="Cross river">Cross River</option>
          <option value="Delta">Delta</option>
          <option value="Ebonyi">Ebonyi</option>
          <option value="Edo">Edo</option>
          <option value="Ekiti">Ekiti</option>
          <option value="Enugu">Enugu</option>
          <option value="Gombe">Gombe</option>
          <option value="Imo">Imo</option>
          <option value="Jigawa">Jigawa</option>
          <option value="Kaduna">Kaduna</option>
          <option value="Kano">Kano</option>
          <option value="Katsina">Katsina</option>
          <option value="Kebbi">Kebbi</option>
          <option value="kogi">Kogi</option>
          <option value="Kwara">Kwara</option>
          <option value="Lagos">Lagos</option>
          <option value="Nasarawa">Nasarawa</option>
          <option value="Niger">Niger</option>
          <option value="Ogun">Ogun</option>
          <option value="Ondo">Ondo</option>
          <option value="Osun">Osun</option>
          <option value="Oyo">Oyo</option>
          <option value="Plateau">Plateau</option>
          <option value="RIvers">Rivers</option>
          <option value="Sokoto">Sokoto</option>
          <option value="Taraba">Taraba</option>
          <option value="Yobe">Yobe</option>
          <option value="Zamfara">Zamfara</option>
    </select>
    {{ $errors->first('listingstate', '<p class="has-error">:message</p>') }}                    
      <input name="listingcity" class="form-control" value="{{ old('listingcity')}}" placeholder="City located" />
    {{ $errors->first('listingcity', '<p class="has-error">:message</p>') }}                 
    </div>
    </div>
     <div class="form-group">
      <label class="control-label">Listing Address*:</label>                        
      <input name="listingaddress" class="form-control" value="{{ old('listingaddress')}}" placeholder="Listing Address" />
      {{ $errors->first('listingaddress', '<p class="has-error">:message</p>') }}  
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label">Listing Amenities:</label>                        
          <textarea class="form-control" name="listingamenities" placeholder="Specify listing Amenities separated by comma">{{ old('listingamenities') }}</textarea>
          {{ $errors->first('listingamenities', '<p class="has-error">:message</p>') }}  
        </div>               
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label">Listing Policy:</label>                        
          <textarea name="listingpolicy" class="form-control" placeholder="Listing policy...">
          {{ old('listingpolicy') }}</textarea>
          {{ $errors->first('listingpolicy', '<p class="has-error">:message</p>') }}  
        </div>              
      </div>
      
    </div>
</fieldset>
<fieldset>
  <legend>Listing Images</legend>
    <div class="row">
        <div class="col-md-6">
          <!-- <div class="form-group">
            <label for="exampleInputFile">Video</label>                   
            <input type="hidden" name="maxvideo" value="500000" />
            <input name="video" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a 30 secs video of the listing(10mb)</p>
          </div> --> 
           <div class="form-group">
            <label for="exampleInputFile">Image One *:</label>                    
            <input type="hidden" name="listingimg" max="100000" />
            <input name="listingimg" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
            {{ $errors->first('listingimg', '<p class="has-error">:message</p>') }}  
          </div>           
          <div class="form-group">
            <label for="exampleInputFile">Image Three *:</label>                    
            <input type="hidden" name="listingimg" max="100000" />
            <input name="listingimg3" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div>  
           <!-- <div class="form-group">
            <label for="exampleInputFile">Image Five *:</label>                    
            <input type="hidden" name="listingimg" max="100000" />
            <input name="listingimg5" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div>  -->     
          <div class="form-group">                     
            <p>
            <input type="checkbox" name="termsofservice" class="termsofservice" required />
            I accept the <a href="terms-of-service.html">Terms of service</a> </p>             
          </div>                                                
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputFile">Image Two *:</label>                    
            <input type="hidden" name="listingimg2" max="100000" />
            <input name="listingimg2" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image Four *:</label>                    
            <input type="hidden" name="listingimg" max="100000" />
            <input name="listingimg4" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div> 
          <!--  <div class="form-group">
            <label for="exampleInputFile">Image Six *:</label>                    
            <input type="hidden" name="listingimg" max="100000" />
            <input name="listingimg6" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div> -->       
        </div>
      </div>
</fieldset>            
  
