<!-- ADD MODAL -->
<div class="modal fade add-modal" data-backdrop="static" data-keyboard="false" id="App-Views-AddUtilityPrinterManagementModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <form>
        {{ Form::token() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Add</h4>
        </div>
        <div class="modal-body">
          <!-- Name -->
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Label">
          </div>
          <!-- Description-->
          <div class="form-group">
              <label for="name">Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Enter Label">
          </div>
          <!-- API Settings -->
          <div class="form-group">
              <label for="name">API Settings</label>
              <textarea class="form-control" rows="3" id="api_settings" name="api_settings" placeholder="Enter value"></textarea>
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