<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-SysEditPaperColorModal">
  <div class="modal fade edit-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit - <%= dex_code %></h4>
          </div>
          <form>
            {{ Form::token() }}
            <div class="modal-body">
              <div class="form-group">
                  <label for="en_name">Name[en]</label>
                  <input type="text" class="form-control" name="en_name" id="en_name" value="<%= en_name %>" placeholder="Enter Name[en]">
              </div>
              <div class="form-group">
                  <label for="ar_name">Name[ar]</label>
                  <input type="text" class="form-control" name="ar_name" id="ar_name" value="<%= ar_name %>" placeholder="Enter Name[ar]">
              </div>
              <div class="form-group">
                  <label for="en_description">Description[en]</label>
                  <textarea class="form-control" name="en_description" id="en_description" placeholder="Enter Description[en]"><%= en_description %></textarea>
              </div>
              <div class="form-group">
                  <label for="ar_description">Description[ar]</label>
                  <textarea class="form-control" name="ar_description" id="ar_description" placeholder="Enter Description[ar]"><%= ar_description %></textarea>
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
