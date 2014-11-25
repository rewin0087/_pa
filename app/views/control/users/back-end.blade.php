
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Backends</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="backend-table">
                <thead class="theadcolor">
                    <tr>
                        <th width="100px">id</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th width="100px"></th>
                    </tr>
                </thead>
                <tbody class="tbodycolor">
                   <!-- Render the collection here -->
                   <tr>
                       <td colspan="4">
                           <p class="center">No records found.</p>
                       </td>
                   </tr>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-backend-modal">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add
                </a>
            </div>
        </div>
    </div>
</div>

<!-- TARGET HTML OF EDIT MODAL -->
<div data-target-template="App-Views-EditBackendModal-Target"></div>
<!-- TARGET HTML OF REMOVE MODAL -->
<div data-target-template="App-Views-DeleteBackendModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.users._partials.backend.list-detail')

<!-- ADD MODAL -->
@include('control.users._partials.backend.add-modal')

<!-- EDIT MODAL -->
@include('control.users._partials.backend.edit-modal')

<!-- DELETE MODAL -->
@include('control.users._partials.backend.delete-modal')


