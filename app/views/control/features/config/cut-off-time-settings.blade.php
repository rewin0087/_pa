
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Cut Off Time Settings</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="cut-off-time-settings-table">
                <thead  class="theadcolor">
                    <tr>
                        <th width="100px">id</th>
                        <th>label</th>
                        <th>value</th>
                        <th width="50px"></th>
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
<div data-target-template="App-Views-EditConfigCutOffTimeSettingsModal-Target"></div>
<!-- TARGET HTML OF REMOVE MODAL -->
<div data-target-template="App-Views-DeleteConfigCutOffTimeSettingsModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.features.config._partials.cut-off-time-settings.list-detail')

<!-- ADD MODAL -->
@include('control.features.config._partials.cut-off-time-settings.add-modal')

<!-- EDIT MODAL -->
@include('control.features.config._partials.cut-off-time-settings.edit-modal')

<!-- DELETE MODAL -->
@include('control.features.config._partials.cut-off-time-settings.delete-modal')
    

