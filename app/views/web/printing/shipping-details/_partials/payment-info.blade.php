<div class="col-xs-6">
    <div class="panel panel-default panel2 panel-margin">
        <div class="pb panel-heading2">
            PAYMENT INFO
        </div>
        <div class="panel-body  payment-info">
            <form class="payment_options">
                <div class="col-xs-12 form-group">
                    <div class="row">
                        <label>
                            <input class="payment_options" id="payment_options" type="radio" name="payment_options" value="credit-card" data-trigger-credit-card="1">
                            CREDIT CARD 
                        </label>
                        <span class = "pull-right">                        
                            <img src="/assets/visa_icon.gif" width=40 length=40>
                            <img src="/assets/mastercard_icon.gif" width=40 length=40>
                        </span>
                    </div>
                    <hr class="payment-info-divider">
                    <div class="row">
                        <label>
                            <input class="payment_options" id="payment_options" type="radio" name="payment_options" value="paypal">
                            PAYPAL
                        </label>
                        <span class = "pull-right">
                            <img class="" src="/assets/paypal_icon.gif" width=50 length=50>
                        </span>
                    </div>
                    <hr class="payment-info-divider">
                    <div class="row">
                        <label>
                            <input class="payment_options" id="payment_options" type="radio" name="payment_options" id="bank-transfer" value="bank-transfer">
                            BANK TRANSFER(Pre-paid)
                        </label>
                        <a href="#"><i class="fa fa-question-circle"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default panel2 panel-margin">
        <div class="pb panel-heading2">
            DISCOUNTS AND FINAL TOTAL
        </div>
        <div class="panel-body  payment-info">
            <form class="discounts-and-totals">
                <div class="col-xs-12 form-group">
                    <div class="row">
                        <label>
                            <input class="discounts-final-total" id="discounts-final-total" type="radio" name="discounts" value="apply-promocode">
                            APPLY PROMO CODE
                        </label>
                        &nbsp;
                        <input type="text" name="promocode" id="promocode">
                    </div>
                    <hr class="payment-info-divider">
                    <div class="row">
                        <label>
                            <input class="discounts-final-total"  id="discounts-final-total" type="radio" name="discounts" value="use-my-points">
                            USE MY POINTS, I HAVE AED 96 POINTS <a href="#"><i class="fa fa-question-circle"></i></a>
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default panel2 panel-margin">
        <div class="pb panel-heading2">
            FINAL NOTE
        </div>
        <div class="panel-body payment-info">
            <form class="final_note">
                <div class="col-xs-12 form-group">
                    <textarea id="final_note" name="final_note" class="form-control" rows=3></textarea>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default panel2 panel-margin">
        <div class="pb panel-heading2">
            TERMS AND CONDITIONS
        </div>
        <div class="panel-body payment-info">
            <div class="terms-wrapper clearfix container-fluid">
                <div class="terms-content">
                    <small class="content_font term_condition">
                    Molestie penatibus aenean ultricies libero. Mauris quam ipsum tincidunt malesuada quisque conubia metus at consequat. Eleifend scelerisque vitae cum pulvinar donec dictum erat viverra pulvinar erat sagittis. Purus laoreet pharetra magna feugiat himenaeos purus tincidunt. Non viverra mollis natoque lacus congue at varius accumsan! Justo facilisi sem class risus curae; fusce non blandit. Egestas fames nunc iaculis tellus a ridiculus. Nisl massa netus nascetur sodales himenaeos dictumst habitasse lacus tellus. Rhoncus fermentum suspendisse conubia accumsan faucibus molestie? In id odio massa per dis vehicula dapibus. Tristique ad est sem. Sapien.
                    </small>
                </div>
                <div class="terms_and_conditions">
                    <form>
                        <input class="terms_and_conditions" id="terms_and_conditions" type="checkbox" name="terms_and_conditions" value="1">
                        By selecting this, I agree all terms & conditions <!-- <a href="#"><i class="fa fa-question-circle"></i></a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>