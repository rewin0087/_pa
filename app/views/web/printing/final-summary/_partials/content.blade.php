<section id="select-options">
    <div class="row">
        <div class="col-xs-12">
            <div id="step-description">
                <div class="container-fluid process-label">
                    <h3 class="cart-icon clearfix">
                        <i class="icon-bag"></i>
                        <small>Final Summary</small>
                    </h3>
                </div>
                <!-- CART HOLDER -->
                <div id="cart-holder"></div>
                <!-- CART SETTING HOLDER -->
                <div id="cart-setting-holder"></div>
                
                <!-- BUTTOM NAVIGATION -->
                <div class="step-control-prv-nex mT180a">
                    <div id="row ">
                        <div class="col-xs-6 a-link sfheight">
                            <a href="/printing/shipping-details" class="pull-left ">
                                <span class="icon-left-dir-1 icons"></span>
                                <span class="brown btn btn-xs">GO BACK</span>
                                <small>SHIPPING DETAILS</small>
                            </a>
                        </div>
                        <div class="col-xs-6 a-link sfheight">
                            <a href="#" class="pull-right" id="go-to-payment">
                                <small>PAYMENT</small>
                                <span class="darkbrown btn btn-xs">GO NEXT</span>
                                <span class="icon-right-dir-1 icons"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CART SETTINGS TEMPLATE -->
@include('web.printing.final-summary._partials.cart-settings')
