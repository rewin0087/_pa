<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Configurations</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="configurations-table">
                <thead class="theadcolor">
                    <tr>
                        <th width="100px">id</th>
                        <th>Key</th>
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
<div data-target-template="App-Views-EditConfigConfigurationModal-Target"></div>
<!-- TARGET HTML OF REMOVE MODAL -->
<div data-target-template="App-Views-DeleteConfigConfigurationModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.features.config._partials.configurations.list-detail')

<!-- ADD MODAL -->
@include('control.features.config._partials.configurations.add-modal')

<!-- EDIT MODAL -->
@include('control.features.config._partials.configurations.edit-modal')

<!-- DELETE MODAL -->
@include('control.features.config._partials.configurations.delete-modal')