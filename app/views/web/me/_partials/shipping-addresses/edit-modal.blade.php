<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-EditShippingAddressModal">
<div class="modal fade edit-modal-shipping" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md add-shipping-modal-width">
    <div class="modal-content">
      <form>
        {{ Form::token() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Add Shipping Address</h4>
        </div>
        <div class="modal-body">
          <div class="col-xs-12 form-group">
              <input type="hidden" class="form-control" id="user_id" name="user_id" value="<%= user_id %>">
          </div>

        <div class="col-xs-12">
            <div class="col-xs-6 form-group type_of_address">
                <label for="type_of_address">Location Type</label>
                <select class="form-control" id="type_of_address" name="type_of_address">
                    <option value="1" <%if (type_of_address==1){ %> selected <%}%>>Home</option>
                    <option value="2" <%if (type_of_address==2){ %> selected <%}%>>Business</option>
                </select>
            </div>

            <div class="col-xs-6 form-group country">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" name="country">
                        <option value="United Arab Emirates" <%= country=='United Arab Emirates' ? 'selected' : '' %>>United Arab Emirates</option>
                    </select>
            </div>

            <div class="col-xs-6 form-group receiving_first_name">
                <label for="receiving_first_name">First Name</label>
                <input type="text" class="form-control" id="receiving_first_name" name="receiving_first_name" placeholder="First Name" value="<%= receiving_first_name %>">
            </div>

            <div class="col-xs-6 form-group city">
                    <label for="city">City</label>
                    <select class="form-control" id="city" name="city">
                        <option value="Dubai" <%= city=='Dubai' ? 'selected' : '' %>>Dubai</option>
                        <option value="Abu Dhabi" <%= city=='Abu Dhabi' ? 'selected' : '' %>>Abu Dhabi</option>
                    </select>
            </div>

            <div class="col-xs-6 form-group receiving_last_name">
                <label for="receiving_last_name">Last Name</label>
                <input type="text" class="form-control" id="receiving_last_name" name="receiving_last_name" placeholder="Last Name" value="<%= receiving_last_name %>">
            </div>

            <div class="col-xs-6 form-group area">
                    <label for="area">Area</label>
                    <select class="form-control" id="area" name="area">
                        <option value="Al Badaa" <%= area=='Al Badaa' ? 'selected' : '' %>>Al Badaa</option>
                        <option value="Abu Hail" <%= area=='Abu Hail' ? 'selected' : '' %>>Abu Hail</option>
                    </select>
            </div>

            <div class="col-xs-6 form-group company_name">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<%= company_name %>">
            </div>

            <div class="col-xs-6 form-group street">
                <label for="street">Street Name/No.</label>
                <input type="text" class="form-control" id="street" name="street" placeholder="Street Name/No." value="<%= street %>">
            </div>

            <div class="col-xs-6 form-group mobile_number">
                <label for="mobile_number">Mobile Number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<%= mobile_number %>">
            </div>
            
            <div class="col-xs-6  form-group building_name">
                <label for="building_name">Building Name/No.</label>
                <input type="text" class="form-control" id="building_name" name="building_name" placeholder="Building Name" value="<%= building_name %>">
            </div>

            <div class="col-xs-6 form-group telephone_number">
                <label for="telephone_number">Landline Number</label>
                <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="Landline Number" value="<%= telephone_number %>">
            </div>

            

            <div class="col-xs-6 form-group delivery_cutoff_time_id">
              <label for="delivery_cutoff_time_id">Preferred Delivery Time</label>
                <select class="form-control" id="delivery_cutoff_time_id" name="delivery_cutoff_time_id">
                    <option value="1" <%= delivery_cutoff_time_id==1 ? 'selected' : '' %>>9:00 AM ~ 1:00 PM</option>
                    <option value="2" <%= delivery_cutoff_time_id==2 ? 'selected' : '' %>>1:00 PM ~ 5:00 PM</option>
                    <option value="3" <%= delivery_cutoff_time_id==3 ? 'selected' : '' %>>5:00 PM ~ 9:00 PM</option>
                </select>
            </div>

            <div class="col-xs-6  form-group floor">
                <label for="floor">Floor No.</label>
                <input type="text" class="form-control" id="floor" name="floor" placeholder="Floor No." value="<%= floor %>">
            </div>


            <div class="col-xs-6  form-group apartment">
                <label for="apartment">Apartment No.</label>
                <input type="text" class="form-control" id="apartment" name="apartment" placeholder="Apartment No." value="<%= apartment %>">
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary update">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
</script>