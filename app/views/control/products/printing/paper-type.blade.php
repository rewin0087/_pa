
<div class="col-md-12" id="product-printing-paper-type-holder">
    <div id="product-printing-identity" data-print-product-id="{{ $print_product_id }}" data-en-name="{{ $en_name }}"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Print Product - Paper type [ {{ $en_name }} ]</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="product-printing-paper-type-table">
                <thead class="theadcolor">
                    <tr>
                        <th width="70px">id</th>
                        <th>Name</th>
                        <th>Finishing File</th>
                        <th>Pricing File</th>
                        <th width="30px"></th>
                    </tr>
                </thead>
                <tbody class="tbodycolor">
                   <!-- Render the collection here -->
                   
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <a href="/products/printing" class="btn btn-primary">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                    Back
                </a>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-modal">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add
                </a>
            </div>
        </div>
    </div>
</div>
<!-- TARGET HTML OF EDIT MODAL -->
<div data-target-template="App-Views-EditProductPrintingPaperTypeModal-Target"></div>
<!-- TARGET HTML OF REMOVE MODAL -->
<div data-target-template="App-Views-DeleteProductPrintingPaperTypeModal-Target"></div>

<!-- LIST DETAIL ITEM -->
@include('control.products.printing._partials.paper-type.list-detail')

<!-- ADD MODAL -->
@include('control.products.printing._partials.paper-type.add-modal')

<!-- EDIT MODAL -->
@include('control.products.printing._partials.paper-type.edit-modal')

<!-- DELETE MODAL -->
@include('control.products.printing._partials.paper-type.delete-modal')

