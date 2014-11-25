<section id="select-options">
    <div class="row">
        <div class="col-xs-12">
            <div id="step-description">
                <div class="container-fluid process-label">
                    <h3 class="cart-icon clearfix">
                        <h1>Cart<strong>Summary</strong></h1>
                    </h3>
                </div>
                <div data-template-target="cart-holder"></div>
                <div class="col-xs-12 clearfix">
                    <div class="buttom-action">
                        <a href="/printing/select-product" class="button-white">SHOP MORE</a>
                        <a href="#" class="button-white" id="empty-cart">
                            <span>EMPTY</span>
                            <span class="glyphicon glyphicon-shopping-cart mL5"></span>
                        </a>
                    </div>
                    <div class="right mT20 prev-next">
                        <div class=" font18px cart-grand-total">
                            Grand Total:
                            <span id="grand_total"></span>
                        </div>
                    </div>
                </div>
                <div class="step-control-prv-nex button_margin">
                    <div id="row">   
                        <div class="col-xs-12 a-link move-to-right">
                            <a href="/printing/setup-finishing" class="pull-left ">
                                <i class="icon-left-dir-1 icons"></i>
                                <div class="brown btn btn-xs">GO BACK</div><br>
                                <small> SETUP FINISHING</small>
                            </a>
                            <a href="/printing/shipping-details" id="go-to-shipping-details" class="pull-right">
                                <div class="darkbrown btn btn-xs">GO NEXT</div>
                                <i class="icon-right-dir-1 icons"></i><br>
                                <small> SHIPPING DETAILS</small>   
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="row">
        <div class="col-xs-12 no_padding">
            <div id="step-content2">
                <div id="order-faqs2" >
                    <ul class="img-list">
                        <li>
                            <div class="borL"></div>
                            <a href="#">
                            <img src="/assets/web/thumb1.png" width="280" height="110"/>
                            <span class="text-content"><span>Place Name</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <img src="/assets/web/thumb2.png" width="280" height="110"/>
                            <span class="text-content"><span>Design Templates</span></span>
                            </a>
                        </li>
                        <li>
                            <div class="borR"></div>
                            <a href="#">
                            <img src="/assets/web/thumb3.png" width="280" height="110"/>
                            <span class="text-content"><span>Data Tutorials</span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CART ITEM VIEW -->
@include('web.printing.cart-summary._partials.cart-item')