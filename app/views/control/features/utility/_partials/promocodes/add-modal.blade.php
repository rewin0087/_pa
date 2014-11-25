<!-- ADD MODAL -->
<div class="modal fade add-modal" data-backdrop="static" data-keyboard="false" id="App-Views-AddUtilityPromocodeModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <form>
        {{ Form::token() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Add Promocode</h4>
        </div>
        <div class="modal-body">
          <!-- Select Type -->
          <div class="form-group">
              <label for="name">Select Type</label>
              <select class="form-control select-picker" id="type" name="type">
      				  <option value="1">Submission Time Account</option>
      				  <option value="2">Period Account</option>
      				  <option value="3">Regular Account</option>
      			  </select>
          </div>

          <!-- DATE SETTING -->
          <div id="date_section" class="hiding">

            <!-- DATE From-->
            <div class="form-group">
              <label for="name">From</label>
              <input type="text" class="form-control date-picker" id="date_from" name="date_from">
            </div>

            <!-- DATE To -->
            <div class="form-group">
              <label for="name">To</label>
              <input type="text" class="form-control date-picker" id="date_to" name="date_to">
            </div>
          </div>

          <!-- TIME SETTING -->
          <div id="time_section">

            <!-- TIME From-->
            <div class="form-group">
              <label for="name">From</label>
              <div class="bfh-timepicker" data-mode="12h" data-name="time_from">
                <input type="text" class="form-control" id="time_from" name="time_from">
              </div>
            </div>

            <!-- TIME To -->
            <div class="form-group">
              <label for="name">To</label>
              <div class="bfh-timepicker" data-mode="12h" data-name="time_to">
                <input type="text" class="form-control " id="time_to" name="time_to">
              </div>
            </div>
          </div>

          <!-- Select Type -->
          <div class="form-group">
              <label for="name">Discount By</label>
              <select class="form-control select-picker" id="discount" name="discount">
        			  <option value="1">By Percentage Of Total Sales</option>
        			  <option value="2">By Amount</option>
        		  </select>
		      </div>

          <!-- AMOUNT -->
          <div class="form-group hiding" id="amount_section">
	          <label for="name">Amount</label>
	          <div class="input-group">
              <span class="input-group-addon">P</span>
    				  <input type="number" name="amount" id="amount" class="form-control" placeholder="0.00">
    			  </div>
		      </div>

          <!-- PERCENT -->
          <div class="form-group" id="percent_section">
            <label for="name">Percent</label>
            <div class="input-group">
              <input type="number" name="percent" id="percent" class="form-control" placeholder="0.00">
              <span class="input-group-addon">%</span>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary save">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>