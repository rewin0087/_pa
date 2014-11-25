<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-SysEditFinishingProductionsModal">
  <div class="modal fade edit-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit - <%= info %></h4>
          </div>
          <form>
            {{ Form::token() }}
            <input type="hidden" name="_method" value="PUT" />
            <input type="hidden" name="id" value="<%= id %>" />
            <input type="hidden" name="thumbnail_id" value="<%= thumbnail_id %>" />
            <div class="modal-body">
              <div class="form-group">
                <label>Image</label>
                <div class="row">
                  <div class="col-md-4">
                  <img src="/media/image/<%= !!image ? image.id : '' %>/<%= !!image ? image.original_name : '' %>" alt="IMAGE" class="col-md-12" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <input type="file" class="hide" name="fp_image" id="fp_image_file">
                        <button type="button" class="btn btn-default file-upload form-control" data-target="fp_image_file">Change Image</button>
                    </div>
                </div>
                </div>
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