<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Promocodes</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="utility-promocode-table">
                <thead class="theadcolor">
                    <tr>
                        <th>#</th>
                        <th width="120px">Code</th>
                        <th width="240px">Type</th>
                        <th>Less</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Use Count</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody class="tbodycolor">
                   <!-- Render the collection here -->
                   <tr>
                       <td colspan="10">
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
@include('control.features.utility._partials.promocodes.list-detail')

<!-- ADD MODAL -->
@include('control.features.utility._partials.promocodes.add-modal')
    
