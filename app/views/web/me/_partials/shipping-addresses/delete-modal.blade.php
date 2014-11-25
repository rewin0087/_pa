<!-- DELETE MODAL -->
<script type="text/template" id="App-Views-DeleteShippingAddressModal">
  <div class="modal fade delete-modal-shipping" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Remove - <%= receiving_first_name %> <%= receiving_last_name %></h4>
          </div>
          <div class="modal-body">
            <div class="callout callout-danger">
            <p>Are you sure you want to remove <%= receiving_first_name %> <%= receiving_last_name %>?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger delete">Delete</button>
          </div>
      </div>
    </div>
  </div>
</script>