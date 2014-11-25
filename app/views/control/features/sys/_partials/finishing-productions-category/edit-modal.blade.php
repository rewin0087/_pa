<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-SysEditFinishingProductionsCategoryModal">
  <div class="modal fade edit-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit - <%= code_name %></h4>
          </div>
          <form>
            {{ Form::token() }}
            <div class="modal-body">
              <div class="form-group">
                  <label for="code_name">Code Name</label>
                  <input type="text" class="form-control" name="code_name" id="code_name" value="<%= code_name %>" placeholder="Enter Code Name">
              </div>
              <div class="form-group">
                  <label for="en_name">Name[en]</label>
                  <input type="text" class="form-control" name="en_name" id="en_name" value="<%= en_name %>" placeholder="Enter Name[en]">
              </div>
              <div class="form-group">
                  <label for="ar_name">Name[ar]</label>
                  <input type="text" class="form-control" name="ar_name" id="ar_name" value="<%= ar_name %>" placeholder="Enter Name[ar]">
              </div>
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary update">Save changes</button>
          </div>
      </div>
    </div>
  </div>
</script>