<div id="proces-page">
    <!-- <div id="back-bgcolor">&nbsp;</div> -->
    <div class="container">
        <!--Tab-->
        @include('web.printing.shipping-details._partials.tab')
        <section id="select-options">
            <div class="row">
                <div id="step-description">
                    <div class="container-fluid process-label">
                        <h3 class="cart-icon clearfix">
                            <h1>Delivery<strong>Details</strong></h1>
                        </h3>
                    </div>
                    <div class="form-group clearfix"></div>
                    <div class="panel-box">
                        <div class="left-panel">
                            @include('web.printing.shipping-details._partials.delivery-info')
                        </div>
                    </div>
                    <div class="panel-box">
                        <div class="right-panel">
                            @include('web.printing.shipping-details._partials.payment-info')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 a-link marg sfheight">
                    <a href="/printing/cart-summary" class="pull-left ">
                        <i class="icon-left-dir-1 icons"></i>
                        <div class="brown btn btn-xs">GO BACK</div>
                        <br><small>&nbsp;&nbsp;&nbsp;&nbsp;CART SUMMARY</small>
                    </a>
                </div>
                <div class="col-xs-6 a-link">
                    <a href="#" class="pull-right next">
                        <div class="darkbrown btn btn-xs">GO NEXT</div>
                        <i class="icon-right-dir-1 icons"></i>
                        <br><small> FINAL SUMMARY</small> 
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- TARGET HTML OF EDIT ADDRESS MODAL -->
<div data-target-template="App-Views-EditPrintingShippingAddressModal-Target"></div>
<!-- TARGET HTML OF REMOVE ADDRESS MODAL -->
<div data-target-template="App-Views-DeletePrintingShippingAddressModal-Target"></div>

@include('web.printing.shipping-details._partials.add-shipping-details-modal')
@include('web.printing.shipping-details._partials.edit-shipping-details-modal')
@include('web.printing.shipping-details._partials.delete-shipping-details-modal')