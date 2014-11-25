<div id="current-selection">
    <h5>YOUR CURRENT SELECTION</h5>
    <div class="p-title">
        <div class="bullet-grey"></div><span>{{{ $cart['product']['en_name'] }}}</span>
        <a href="#" id="update-given-name" data-target="#item-given-name" data-toggle="modal">
            <div class="givename">{{{ $cart['item_given_name']['cart_item_name'] or 'GIVENAME' }}}</div>
        </a>
    </div>

    <!-- Printing Section -->
    <div class="cont-title">PRINTING</div>
    <ul class="cont-a">
        <!-- PAPER SIZE -->
        <li>
            <div class="row">
                <div class="col-xs-6">
                    <p class="glyphicon glyphicon-record inline"></p>
                    <p class="mL5 inline">PAPER SIZE:</p>
                </div>
                <div class="col-xs-6">
                    <p id="paper-size-selected">{{{ $cart['paper_size']['dex_en_name'] or 'Not Selected' }}}</p>
                </div>
            </div>
        </li>
        <!-- PAPER TYPE -->
        <li>
            <div class="row">
                <div class="col-xs-6">
                    <p class="glyphicon glyphicon-record inline"></p>
                    <p class="mL5 inline">PAPER TYPE:</p>
                </div>
                <div class="col-xs-6">
                    <p id="paper-type-selected">{{{ $cart['paper_type']['en_name'] or 'Not Selected' }}}</p>
                </div>
            </div>
        </li>
        <!-- PRINT COLORS -->
        <li>
            <div class="row">
                <div class="col-xs-6">
                    <p class="glyphicon glyphicon-record inline"></p>
                    <p class="mL5 inline">PRINT COLORS:</p>
                </div>
                <div class="col-xs-6">
                    <p id="paper-color-selected">{{{ $cart['paper_color']['dex_en_name'] or 'Not Selected' }}}</p>
                </div>
            </div>
        </li>
        <!-- QUANTITY -->
        <li>
            <div class="row">
                <div class="col-xs-6">
                    <p class="glyphicon glyphicon-record inline"></p>
                    <p class="mL5 inline">QUANTITY:</p>
                </div>
                <div class="col-xs-6">
                    <p id="quantity-selected">{{{ $cart['quantity_price']['quantity'] or 'Not Selected' }}}</p>
                </div>
            </div>
        </li>
        <!-- PRINTING PRICE -->
        <li>
            <div class="row">
                <div class="col-xs-6">
                    <p class="glyphicon glyphicon-record inline"></p>
                    <p class="mL5 inline">PRINTING PRICE:</p>
                </div>
                <div class="col-xs-6">
                    <p id="printing-price-selected"><?php echo isset($cart['quantity_price']['price']) && $cart['quantity_price']['price'] ? "AED " . number_format($cart['quantity_price']['price'], 2) : 'Not Selected'; ?></p>
                </div>
            </div>
        </li>
    </ul> 

    <!-- Finishing Section -->
    <div class="cont-title">Finishing</div>
    <!-- FINISHING HOLDER -->
    <div class="finishing-final-holder">    
    </div>
    <ul class="cont-a">
        <!-- SUBTOTAL -->
        <li>
            <div class="row">
                <div class="col-xs-6">
                    <p class="glyphicon glyphicon-record inline"></p>
                    <p class="mL5 inline">SUBTOTAL:</p>
                </div>
                <div class="col-xs-6">
                    <p id="total-price-selected">AED 0</p>
                </div>
            </div>
        </li>
        <!-- SHIPPING COST -->
        <li class="w290">
            <div class="row">
                <div class="col-xs-6">
                    <p class="glyphicon glyphicon-record inline"></p>
                    <p class="mL5 inline">SHIPPING COST:</p>
                </div>
                <div class="col-xs-6">
                    <p id="shipping-cost-selected" class="mLn7">
                        <strong>SHIPPING FREE</strong>
                    </p>
                </div>
            </div>
        </li>
        <!-- ESTIMATED TAT -->
        <li>
            <div class="row">
                <div class="col-xs-6">
                    <p class="glyphicon glyphicon-record inline"></p>
                    <p class="mL5 inline">ESTIMATED TAT</p>
                </div>
                <div class="col-xs-6">
                    <p id="estimated-tat-selected">
                        <strong>NOT SELECTED</strong>
                    </p>
                </div>
            </div>
        </li>
    </ul>
    <!-- current cost -->
    <div>
        <p class="text-danger text-center">
            <strong> 
                Current Cost:
                <span class="mL5" id="current-cost-selected">AED 0</span> 
            </strong>
        </p>
    </div>

    <div class="arr pull-right arr-R"></div>
</div>

<!--  FINISHING FINAL ROW ITEM -->
<script type="text/template" id="App-Views-Finishing-Final-Item">
    <div class="col-xs-5"><%= en_name %></div>
    <div class="col-xs-7">
        <p id="sub-total-selected">AED <%= _h.currency_format(pricing.price) %></p>
    </div>
</script>