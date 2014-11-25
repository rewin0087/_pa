<!-- Modal QUANTITY & PRICE SELECTION-->
<div class="modal fade" id="qtyModal" data-backdrop="static" data-keyboard="false" tabindex="-13" role="dialog" >
    <div class="modal-dialog  modal-l">
        <div class="modal-content modal-lg-h">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">QUANTITY &amp; PRICE SELECTION:</h4>
            </div>
            <div class="modal-body qty-modal-body">
                <div class="table-scroll mTn20">
                    <table class="table table-qty" id="table-quantity-prices">
                        <thead >
                            <th class="bordered text-center">Quantity</th>
                            <th class="bordered text-center"><span class="mR10">1 day</span></th>
                            <th class="bordered text-center"><span class="mR10">3 days</span></th>
                            <th class="bordered text-center"><span class="mR10">5 days</span></th>
                            <th class="bordered text-center"><span class="mR10">Same day</span></th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Modal GIVEN NAME -->
@include('web.printing.setup-options._partials.given-name-modal')