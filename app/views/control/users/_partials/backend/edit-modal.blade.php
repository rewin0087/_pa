<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-EditBackendModal">
  <div class="modal fade edit-backend-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form>
          {{ Form::token() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Backend User: <%= first_name %></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="name">Email Address</label>
                <input type="email" class="form-control" name="email" id="email-address" placeholder="Enter Email Address" value="<%= email %>">
            </div>
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first-name" placeholder="Enter First Name" value="<%= first_name %>">
            </div>
            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last-name" placeholder="Enter Last Name" value="<%= last_name %>">
            </div>
            <div class="alert alert-info">
              <p><strong>NOTE:</strong> 'administrator' group cant be remove from this user.</p>
            </div>
            <div class="form-group radiomarg" id="group-list">

            </div>
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