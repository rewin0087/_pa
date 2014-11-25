<!-- ADD MODAL -->
<div class="modal fade add-modal" data-backdrop="static" data-keyboard="false" id="App-Views-AddAddressModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <form>
        {{ Form::token() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Add Shipping Address</h4>
        </div>
        <div class="modal-body">
          <div class="col-xs-12 form-group">
              <input type="hidden" class="form-control" id="user_id" name="user_id"value="{{ Sentry::getUser()->id }}">
              <input type="hidden" class="form-control" id="type" name="type"value="2">
          </div>
          <div class="col-xs-12 form-group type_of_address">
              <label for="type">Type of Address</label><br>
                <input type="hidden" name="is_corporate" id="is_corporate" />
                <input type="hidden" name="is_primary" id="is_primary" />
                <div class="btn-group">  
                  <button id="btn_is_corporate" type="button" name="address_type" class="btn btn-default">Corporate</button>
                  <button id="btn_is_primary" type="button" name="address_type" class="btn btn-default">Residential</button>
                </div>
          </div>
          <div class="col-xs-12 form-group receiving_first_name">
              <label for="receiving_first_name">Receiving First Name</label>
              <input type="text" class="form-control" id="receiving_first_name" name="receiving_first_name" placeholder="Receiving First Name">
          </div>
          <div class="col-xs-12 form-group receiving_last_name">
              <label for="receiving_last_name">Receiving Last Name</label>
              <input type="text" class="form-control" id="receiving_last_name" name="receiving_last_name" placeholder="Receiving Last Name">
          </div>
          <div class="col-xs-12 form-group company_name hide">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
          </div>
          <div class="col-xs-12 form-group postal_code1">
              <label for="postal_code1">Zip Code 1</label>
              <input type="text" class="form-control" id="postal_code1" name="postal_code1" placeholder="Postal Code 1">
          </div>
          <div class="col-xs-12 form-group postal_code2">
              <label for="postal_code2">Zip Code 2</label>
              <input type="text" class="form-control" id="postal_code2" name="postal_code2" placeholder="Postal Code 2">
          </div>
          <div class="col-xs-12 form-group address">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address">
          </div>
          <div class="col-xs-12  form-group building_name">
              <label for="building_name">Building Name</label>
              <input type="text" class="form-control" id="building_name" name="building_name" placeholder="Building Name">
          </div>
          <div class="col-xs-12 form-group telephone_number">
              <label for="telephone_number">Telephone Number</label>
              <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="Telephone Number">
          </div>
          <div class="col-xs-12 form-group delivery_cutoff_time_id">
              <label for="delivery_cutoff_time_id">Delivery Time</label>
                <select class="form-control" id="delivery_cutoff_time_id" name="delivery_cutoff_time_id">
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
          <button type="button" class="btn btn-primary save">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>