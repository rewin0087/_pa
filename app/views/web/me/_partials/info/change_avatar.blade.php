<div data-target="me-avatar"></div>
<script type="text/template" id="App-Views-EditAvatarModal-Target">
  <div class="modal fade edit-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form id = "avatar">
          {{ Form::token() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Change Avatar Image</h4>
        </div> 
        <div class="modal-body">
          
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