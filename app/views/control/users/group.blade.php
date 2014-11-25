
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Users Group</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="group-table">
                <thead  class="theadcolor">
                    <tr>
                        <th width="100px">id</th>
                        <th>Name</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody class="tbodycolor">
                   <!-- Render the collection here -->
                   <tr>
                       <td colspan="3">
                           <p class="center">No records found.</p>
                       </td>
                   </tr>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-group-modal">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add
                </a>
            </div>
        </div>
    </div>
</div>

<!-- TARGET HTML OF EDIT MODAL -->
<div data-target-template="App-Views-EditGroupModal-Target"></div>
<!-- TARGET HTML OF REMOVE MODAL -->
<div data-target-template="App-Views-DeleteGroupModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.users._partials.group.list-detail')

<!-- ADD MODAL -->
@include('control.users._partials.group.add-modal')

<!-- EDIT MODAL -->
@include('control.users._partials.group.edit-modal')

<!-- DELETE MODAL -->
@include('control.users._partials.group.delete-modal')
    

