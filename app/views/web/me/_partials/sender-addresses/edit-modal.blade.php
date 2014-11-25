<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-EditSenderAddressModal">
  <div class="modal fade edit-modal-sender" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form>
          {{ Form::token() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Edit Sender Address</h4>
        </div> 
        <div class="modal-body">
          <div class="col-xs-12 form-group">
              <input type="hidden" class="form-control" id="user_id" name="user_id"value="<%= user_id %>">
              <input type="hidden" class="form-control" id="type" name="type"value="1">
          </div>
          <div class="col-xs-12 form-group type_of_address">
              <label for="type">Type of Address</label><br>
                <input type="hidden" name="option" value="" id="btn-input" />
                <div class="btn-group">  
                  <button id="is_corporate" type="button" name="is_corporate" class="btn btn-default <%if(is_corporate == 1){%>active<%}%>" data-action="type_of_address" value="<%= is_corporate %>">Corporate</button>
                  <button id="is_primary" type="button" name="is_primary" class="btn btn-default <%if(is_primary == 1){%>active<%}%>" data-action="type_of_address" value="<%= is_corporate %>">Residential</button>
                </div>
          </div>
          <div class="col-xs-12 form-group receiving_first_name">
              <label for="receiving_first_name">Receiving First Name</label>
              <input type="text" class="form-control" id="receiving_first_name" name="receiving_first_name" placeholder="Receiving First Name" value="<%= receiving_first_name %>">
          </div>
          <div class="col-xs-12 form-group receiving_last_name">
              <label for="receiving_last_name">Receiving Last Name</label>
              <input type="text" class="form-control" id="receiving_last_name" name="receiving_last_name" placeholder="Receiving Last Name" value="<%= receiving_last_name %>">
          </div>
          <div class="col-xs-12 form-group company_name">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<%= company_name %>">
          </div>
          <div class="col-xs-12 form-group postal_code1">
              <label for="postal_code1">Zip Code 1</label>
              <input type="text" class="form-control" id="postal_code1" name="postal_code1" placeholder="Postal Code 1" value="<%= postal_code1 %>">
          </div>
          <div class="col-xs-12 form-group postal_code2">
              <label for="postal_code2">Zip Code 2</label>
              <input type="text" class="form-control" id="postal_code2" name="postal_code2" placeholder="Postal Code 2" value="<%= postal_code2 %>">
          </div>
          <div class="col-xs-12 form-group address">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<%= address %>">
          </div>
          <div class="col-xs-12  form-group building_name">
              <label for="building_name">Building Name</label>
              <input type="text" class="form-control" id="building_name" name="building_name" placeholder="Building Name" value="<%= building_name %>">
          </div>
          <div class="col-xs-12 form-group telephone_number">
              <label for="telephone_number">Telephone Number</label>
              <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="Telephone Number" value="<%= telephone_number %>">
          </div>
          <div class="col-xs-12 form-group delivery_cutoff_time_id <%if(is_corporate == 1){%>hide<%}else{%>in<%}%>">
              <label for="delivery_cutoff_time_id">Delivery Time</label>
                <select class="form-control" id="delivery_cutoff_time_id" name="delivery_cutoff_time_id">
                    <option value="">Select Delivery Time</option>
                    <option value="1">08:00~12:00</option>
                    <option value="2">12:00~14:00</option>
                    <option value="3">14:00~16:00</option>
                    <option value="4">16:00~18:00</option>
                    <option value="5">18:00~20:00</option>
                    <option value="6">18:00~21:00</option>
                    <option value="7">19:00~21:00</option>
                </select>
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