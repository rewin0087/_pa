
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Delivery Cut Off Time</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="delivery-cut-off-time-table">
                <thead  class="theadcolor">
                    <tr>
                        <th width="100px">id</th>
                        <th>value</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-modal">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add
                </a>
            </div>
        </div>
    </div>
</div>

<!-- TARGET HTML OF EDIT MODAL -->
<div data-target-template="App-Views-EditConfigDeliveryCutOffTimeModal-Target"></div>
<!-- TARGET HTML OF REMOVE MODAL -->
<div data-target-template="App-Views-DeleteConfigDeliveryCutOffTimeModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.features.config._partials.delivery-cut-off-time.list-detail')

<!-- ADD MODAL -->
@include('control.features.config._partials.delivery-cut-off-time.add-modal')

<!-- EDIT MODAL -->
@include('control.features.config._partials.delivery-cut-off-time.edit-modal')

<!-- DELETE MODAL -->
@include('control.features.config._partials.delivery-cut-off-time.delete-modal')
    

