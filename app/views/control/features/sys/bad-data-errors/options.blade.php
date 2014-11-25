<div class="col-md-12" id="sys-bad-data-error-option-holder">
    <div id="bad-data-error-identity" data-bad-data-error-id="{{ $bad_data_error_id }}" data-dex-code="{{ $dex_code }}"></div>
    <!-- BAD DATA ERROR LIST -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Bad Data Error Option <strong>[{{ $dex_code }}]</strong> </h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20">
                <thead class="theadcolor">
                    <tr>
                        <th width="100px">id</th>
                        <th>Code Name</th>
                        <th>Name (en)</th>
                        <th>Name (jp)</th>
                        <th width="10px"></th>
                    </tr>
                </thead>
                <tbody class="tbodycolor">
                   <!-- Render the collection here -->
                   <tr>
                       <td colspan="5">
                           <p class="center">No records found.</p>
                       </td>
                   </tr>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <a href="/features/sys/bad-data-errors" class="btn btn-primary">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                    Back
                </a>
            </div>
        </div>
    </div>
</div>

<!-- TARGET HTML OF EDIT MODAL -->
<div data-target-template="App-Views-EditSysBadDataErrorOptionModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.features.sys.bad-data-errors._partials.options.list-detail')

<!-- EDIT MODAL -->
@include('control.features.sys.bad-data-errors._partials.options.edit-modal')

