 <fieldset>
    <legend>Sub-Listing Information</legend>  
      <div class="form-group">
        <label class="control-label">Sub-Listing title*:</label>            
        <input name="sublistingtitle" type="text" value="{{ old('sublistingtitle') }}" placeholder="Please specify title of listing" class="form-control" id="email" required />
              {{ $errors->first('sublistingtitle', '<p class="has-error">:message</p>') }} 
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Quantity Available*:</label>            
            <input type="number" value="{{ old('available') }}" placeholder="Specify in figures" name="available" required class="form-control" id="pass" />
                  {{ $errors->first('available', '<p class="has-error">:message</p>') }} 
          </div>                    
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Capacity*:</label>            
            <input name="capacity" value="{{ old('capacity') }}" placeholder="Specify in figures" type="number" class="form-control" id="pass_2" required />
            {{ $errors->first('capacity', '<p class="has-error">:message</p>') }} 
          </div>           
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Description*:</label>                        
        <textarea name="description" type="text" placeholder="Give a brief description" class="form-control">
        {{ old('description') }}
        </textarea>
        {{ $errors->first('description', '<p class="has-error">:message</p>') }}  
      </div>
      <div class="form-group">
        <label class="control-label">Minimum Booking time*:</label>                          
        <div class="form-inline">
          <input type="number" min="1" value="{{ old('minbookingtime') }}" class="form-control" name="minbookingtime" value="Nigeria" />    
          <select name="minbookingtimemeasure" required="required" value="{{ old('minbookingtimemeasure') }}" class="form-control">
                   <!--1 - hrs
                        2 - nights
                        3 - months         
                        4 - year(s)-->
                  <option value="0"> --Choose measure--</option>
                  <option value="/Hour(s)"> / Hour(s)</option>
                  <option value="/Night(s)"> / Night(s)</option>
                  <option value="/Month(s)"> / Month(s)</option>
                  <option value="/Year(s)"> / Year(s)</option>        
            </select>
        </div>  
        {{ $errors->first('minbookingtime', '<p class="has-error">:message</p>') }}                             
        {{ $errors->first('minbookingtimemeasure', '<p class="has-error">:message</p>') }} 
      </div>
      <div class="form-group">
        <label class="control-label">Price* (&#8358;):</label>                          
        <div class="form-inline">
          <input name="price" value="{{ old('price') }}" placeholder="Price in naira" type="number" class="form-control" required /> 
          <select name="pricemeasure" required="required" value="" class="form-control">
            <option value="0"> --Choose measure--</option>
           <option value="/Hour(s)"> / Hour(s)</option>
                  <option value="/Night(s)"> / Night(s)</option>
                  <option value="/Month(s)"> / Month(s)</option>
                  <option value="/Year(s)"> / Year(s)</option>                 
          </select>
        </div>  
        {{ $errors->first('price', '<p class="has-error">:message</p>') }}
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Sub-Listing Amenities:</label>                          
              <textarea name="sublistingamenities" type="text" placeholder="Provide facilities in sub-listings" class="form-control"> 
              {{ old('sublistingamenities') }}             
              </textarea>
            {{ $errors->first('sublistingamenities', '<p class="has-error">:message</p>') }}
          </div>            
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Sub-Listing Policy:</label>                          
            <textarea name="sublistingpolicy" type="text" placeholder="Policy" class="form-control">
            {{ old('sublistingpolicy') }}
            </textarea>
            {{ $errors->first('sublistingpolicy', '<p class="has-error">:message</p>') }}
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
            <input type="hidden" name="sublistingimg" max="100000" />
            <input name="sublistingimg" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
            {{ $errors->first('sublistingimg', '<p class="has-error">:message</p>') }}  
          </div>           
          <div class="form-group">
            <label for="exampleInputFile">Image Three *:</label>                    
            <input type="hidden" name="sublistingimg" max="100000" />
            <input name="sublistingimg3" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div>  
          <!-- <div class="form-group">
            <label for="exampleInputFile">Image Five *:</label>                    
            <input type="hidden" name="sublistingimg" max="100000" />
            <input name="sublistingimg5" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div>      
          <div class="form-group">                     
            <p>
            <input type="checkbox" name="termsofservice" class="termsofservice" required />
            I accept the <a href="terms-of-service.html">Terms of service</a> </p>             
          </div>  -->                                               
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputFile">Image Two *:</label>                    
            <input type="hidden" name="sublistingimg2" max="100000" />
            <input name="sublistingimg2" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image Four *:</label>                    
            <input type="hidden" name="sublistingimg" max="100000" />
            <input name="sublistingimg4" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div> 
           <!-- <div class="form-group">
            <label for="exampleInputFile">Image Six *:</label>                    
            <input type="hidden" name="sublistingimg" max="100000" />
            <input name="sublistingimg6" type="file" id="exampleInputFile" />
            <p class="help-block">Please upload a (760 x 450) image(2mb)</p>
          </div>  -->      
        </div>
      </div>
</fieldset>