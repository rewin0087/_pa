<!-- ADD MODAL -->
<div class="modal fade add-customer-modal" data-backdrop="static" data-keyboard="false" id="App-Views-AddCustomerModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="name">Email Address</label>
              <input type="email" class="form-control" id="email-address" placeholder="Enter Email Address">
          </div>
          <div class="form-group">
              <label for="name">First Name</label>
              <input type="text" class="form-control" id="first-name" placeholder="Enter First Name">
          </div>
          <div class="form-group">
              <label for="name">Last Name</label>
              <input type="text" class="form-control" id="last-name" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
              <div class="alert alert-info">
                <p><strong>Note: </strong> Default password for newly created customer is <span class="label label-danger font-big">mypassword</span></p>
              </div>
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