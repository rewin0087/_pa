<div class="row mT10 text-left">
    <div class="col-xs-6 p0">
        <div class="box-header2">
            <p>Payment Method</p>
        </div>
        <div class="box-body text-left fsheight2">
            <div class="container-fluid payment-sections final-summary-wrapper" style="height: auto; min-height: 127px;">
                <span class="content_font"><br/><strong>Select your payment method</strong></span>
                <ul class="list-unstyled">
                    <% if (!!payment_options && payment_options == 'credit-card') { %>
                    <li>
                        <h4 class="mT10 mB10">Credit Card (recommended) <span class="glyphicon glyphicon-ok"></span></h4>
                        <div>                        
                            <img src="/assets/visa_icon.gif" width="40" length="40">
                            <img src="/assets/mastercard_icon.gif" width="40" length="40">
                        </div>
                    </li>
                    <% } else if (!!payment_options && payment_options == 'bank-transfer') { %>
                    <li>
                        <h4>Bank Transfer (pre-paid) <span class="glyphicon glyphicon-ok"></span></h4>
                    </li>
                    <% } else if (!!payment_options && payment_options == 'paypal') { %>
                    <li>
                        <h4 class="mT10 mB10">Paypal <span class="glyphicon glyphicon-ok"></span></h4>
                        <div>
                            <img class="" src="/assets/paypal_icon.gif" width="50" length="50">
                        </div>
                    </li>
                    <% } %>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-6 p0">
        <div class="box-header2">
            <p>Total and Discount setting</p>
        </div>
        <div class="box-body text-right fsheight2">
            <div class="container-fluid payment-sections final-summary-wrapper" style="height: auto; min-height: 127px;">
                <span class="content_font pcmargin"><br/><strong>No Promocodes Used</strong></span>                                                
                <div data-grandtotal-wrapper="" class="text-right clearfix" style="margin-top:4px;">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <span class="grand-total-label">
                                <div class="text-brown">
                                    <span class="btn-label total-cost-label">Grand Total</span>
                                    <h3 class="total-cost" id="grand_total"></h3>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>