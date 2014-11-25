<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-SysEditPaperFinishingTypeModal">
  <div class="modal fade edit-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
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
                  <label for="dex_code">Dex Code</label>
                  <input type="text" class="form-control" name="dex_code" id="dex_code" value="<%= dex_code %>" placeholder="Enter Dex Code">
              </div>
               <div class="form-group">
                  <label for="dex_en_name">Dex Name[en]</label>
                  <input type="text" class="form-control" name="dex_en_name" id="dex_en_name" value="<%= dex_en_name %>" placeholder="Enter Dex Name[en]">
              </div>
               <div class="form-group">
                  <label for="dex_ar_name">Dex Name[ar]</label>
                  <input type="text" class="form-control" name="dex_ar_name" id="dex_ar_name" value="<%= dex_ar_name %>" placeholder="Enter Name[ar]">
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