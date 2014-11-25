<script type="text/template" id="App-Views-AddShippingAddressModal">    
    <div class="modal fade add-modal-shipping" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <form class="shipping-details">
            {{ Form::token() }}
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Add Shipping Address</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 form-group">
                    <input type="hidden" id="user_id" name="user_id"value="{{ Sentry::getUser()->id }}">
                    <input type="hidden" id="type" name="type"value="2">
                    <input type="hidden" id="country" name="country"value="United Arab Emirates">
                </div>
                <div class="col-xs-12 form-group receiving_first_name">
                    <label for="receiving_first_name">FIRST NAME</label>
                    <input type="text" class="form-control" id="receiving_first_name" name="receiving_first_name" placeholder="FIRST NAME">
                </div>
                <div class="col-xs-12 form-group receiving_last_name">
                            <label for="receiving_last_name">FAMILY NAME</label>
                            <input type="text" class="form-control" id="receiving_last_name" name="receiving_last_name" placeholder="FAMILY NAME">
                </div>
                <div class="col-xs-12 form-group company_name">
                    <label for="company_name">COMPANY NAME</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="COMPANY NAME">
                </div>
                <div class="col-xs-6 form-group mobile_number">
                    <label for="mobile_number">MOBILE PHONE</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="MOBILE PHONE">
                </div>
                <div class="col-xs-6 form-group telephone_number">
                    <label for="telephone_number">LANDLINE</label>
                    <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="LANDLINE">
                </div>
                <div class="col-xs-6 form-group city">
                    <label for="city">CITY</label>
                    <select class="fancy" id="city" name="city">
                        <option value="Dubai" selected>Dubai</option>
                        <option value="Abu Dhabi">Abu Dhabi</option>
                    </select>
                </div>
                <div class="col-xs-6 form-group area">
                    <label for="area">AREA</label>
                    <select class="fancy" id="area" name="area">
                        <option value="Al Badaa" selected="">Al Badaa</option>
                        <option value="Abu Hail">Abu Hail</option>
                    </select>
                </div>
                <div class="col-xs-12 form-group street">
                    <label for="street">STREET NAME</label>
                    <input type="text" class="form-control" id="street" name="street" placeholder="STREET NAME">
                </div>
                <div class="col-xs-12 form-group building_name">
                    <label for="building_name">BUILDING/APARTMENT NAME & NO.</label>
                    <input type="text" class="form-control" id="building_name" name="building_name" placeholder="Building Name">
                </div>
                <div class="col-xs-6 form-group type">
                    <label for="type">LOCATION TYPE</label>
                    <select class="fancy" id="type_of_address" name="type_of_address">
                        <option value="1" selected>HOME</option>
                        <option value="2">BUSINESS</option>
                    </select>
                </div>

                <div class="col-xs-6 form-group pointer">
                    <label for="pointer">LOCATION POINTER</label>
                    <input type="text" class="form-control" id="pointer" name="pointer" placeholder="Location Pointer">
                </div>

                <div class="col-xs-6 form-group delivery_cutoff_time_id">
                    <label for="delivery_cutoff_time_id">DESIRED DELIVERY TIME</label>
                    {{ Form::select('delivery_cutoff_time_id', $DeliveryTimeCollection, null, array('class'=>'fancy','name'=>'delivery_cutoff_time_id','id'=>'delivery_cutoff_time_id')) }}
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" href="#" class="darkbrown btn btn-xs save">SAVE</button>
                        <button type="button" href="#" class="darkbrown btn btn-xs cancel" data-dismiss="modal">CANCEL</button>
                    </div>   
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</script>
<div data-target-template="add-shipping-modal"></div>
<!-- ADD MODAL -->
