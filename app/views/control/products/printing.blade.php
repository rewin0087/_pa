
<div class="col-md-12" id="product-printing-holder">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Product printing</h3>
        </div>
        <div class="box-body table-responsive">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="product-printing-table">
                <thead class="theadcolor">
                    <tr>
                        <th width="70px">id</th>
                        <th>Name (en)</th>
                        <th>Name (ar)</th>
                        <th width="70px"></th>
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
<div data-target-template="App-Views-EditProductPrintingModal-Target"></div>
<!-- TARGET HTML OF REMOVE MODAL -->
<div data-target-template="App-Views-DeleteProductPrintingModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.products._partials.printing.list-detail')

<!-- ADD MODAL -->
@include('control.products._partials.printing.add-modal')

<!-- EDIT MODAL -->
@include('control.products._partials.printing.edit-modal')

<!-- DELETE MODAL -->
@include('control.products._partials.printing.delete-modal')

