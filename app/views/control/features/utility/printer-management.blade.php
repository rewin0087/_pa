<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Printer-Management</h3>
        </div>
        <div class="box-body table-responsive">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="printer-management-table">
                <thead class="theadcolor">
                    <tr>
                        <th width="70px">id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="30px"></th>
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-modal">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add
                </a>
            </div>
        </div>
    </div>
</div>

<!-- TARGET HTML OF EDIT MODAL -->
<div data-target-template="App-Views-EditUtilityPrinter-ManagementModal-Target"></div>
<!-- TARGET HTML OF REMOVE MODAL -->
<div data-target-template="App-Views-DeleteUtilityPrinter-ManagementModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.features.utility._partials.printer-management.list-detail')

<!-- ADD MODAL -->
@include('control.features.utility._partials.printer-management.add-modal')

<!-- EDIT MODAL -->
@include('control.features.utility._partials.printer-management.edit-modal')

<!-- DELETE MODAL -->
@include('control.features.utility._partials.printer-management.delete-modal')
    
