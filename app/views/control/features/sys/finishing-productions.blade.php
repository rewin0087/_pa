
<div class="col-md-12" id="sys-finishing-productions-holder">
<div id="finishing-productions-identity" data-category-name="{{ $category_name }}" data-en-name="{{ $en_name }}"></div>
    <!-- PAPER FINISHING TYPE LIST -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Finishing Productions</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" >
                <thead class="theadcolor">
                    <tr>
                        <th width="100px">id</th>
                        <th>Info</th>
                        <th>Name (en)</th>
                        <th>Name (ar)</th>
                        <th>Category</th>
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
<div data-target-template="App-Views-EditSysFinishingProductionsModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.features.sys._partials.finishing-productions.list-detail')

<!-- EDIT MODAL -->
@include('control.features.sys._partials.finishing-productions.edit-modal')