<div class="col-md-12" id="sys-bad-data-error-holder">
    <!-- BAD DATA ERROR LIST -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Bad Data Error (System)</h3>
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
                        <th width="30px"></th>
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
        <div class="box-footer clearfix"></div>
    </div>
</div>

<!-- TARGET HTML OF EDIT MODAL -->
<div data-target-template="App-Views-EditSysBadDataErrorModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.features.sys._partials.bad-data-errors.list-detail')

<!-- EDIT MODAL -->
@include('control.features.sys._partials.bad-data-errors.edit-modal')

