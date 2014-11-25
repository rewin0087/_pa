<script type="text/template" id="App-Views-Final-Summary-Item">
<div>
    <div class="row mT10 text-left">
        <!-- COLUMN 1 - PRODUCT -->
        <div class="col-xs-3 p0 box-200px">
            <div class="box-header">
                Product
            </div>
            <div class="box-body text-left line_height">
                <!-- PRODUCT NAME -->
                <div class="row mB10">
                    <div class="col-xs-12">
                        <%= item.product.en_name %>
                    </div>
                </div>
                <!-- PRODUCT IMAGE -->
                <div class="row">
                    <div class="col-xs-4">
                        <img src="/media/image/<%= item.product.file_upload_id %>/product" class="image_product" style="width: 70px; height: 60px;">
                    </div>
                    <div class="col-xs-8 add_name text-right">
                        <a href="#" class="link_font">
                            <%= !!item.item_given_name && item.item_given_name.cart_item_name != '' ? item.item_given_name.cart_item_name : 'NO NAME' %>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- COLUMN 2 - ORDER DETAILS -->
        <div class="col-xs-3 p0 box-200px">
            <div class="box-header">
                Order Details
            </div>
            <div class="box-body text-left">
                <!-- PAPER SIZE -->
                <p class="content_font mB10">
                    <strong>Size:</strong> 
                    <span class="bold"><%= item.paper_size.dex_en_name %></span>
                </p>
                <!-- PAPER QUANTITY -->
                <p class="content_font mB10">
                    <strong>Quantity:</strong> 
                    <span class="bold"><%= item.quantity_price.quantity %></span> 
                </p>
                <!-- PAPER COLORS -->
                <p class="content_font mB10">
                    <strong>Colors:</strong>
                    <span class="bold"><%= item.paper_type.en_name %></span>
                </p>
                <!-- PAPER TYPE -->
                <p class="content_font mB10">
                    <strong>Paper: </strong>
                    <span class="bold"><%= item.paper_type.en_name %></span>
                </p>
            </div>
        </div>
        <!-- COLUMN 3 - DATA -->
        <div class="col-xs-2 p0 box-180px">
            <div class="box-header">
                Data
            </div>
            <div class="box-body text-left line_height2">
                <!-- PRINT DATA -->
                <div class="mB10 ellipsis_file">
                    <span class="bold  content_font text-success mB10">Print Data:</span>
                    <div class="mT5">
                        <span class="content_font">
                            <%= !!item.print_data ? item.print_data.original_name : '&nbsp; No File' %>
                        </span> 
                    </div>
                </div>
                <!-- PROOF DATA -->
                <div class="mB10 ellipsis_file">
                    <span class="bold content_font mB10">Proof of Data:</span>
                    <div class="mT5">
                        <span class="content_font">
                            <%= !!item.proof_data ? item.proof_data.original_name : '&nbsp; No File' %>
                        </span> 
                    </div>
                </div>
                <!-- NOTE -->
                <div class="mT5">
                    <small>
                        <a href="#" class="link_font">
                            <span>&nbsp;NOTE:</span>
                             <div class="note-wrapper ellipsis_file">
                                <span><%= !!item.data_note ? item.data_note.cart_add_note : '--' %></span>
                             </div>
                        </a>
                    </small>
                </div>
            </div>
        </div>
        <!-- COLUMN 4 - SHIPPING DATE -->
        <div class="col-xs-2 p0 box-170px">
            <div class="box-header">
                Shipping Date
            </div>
            <div class="box-body text-left">
                <div class="col-xs-2 p0 inside-box">
                    <div class="inside-box-header">
                        <span class="content_font"><%= working_month %></span>
                    </div>
                    <div class="inside-box-body text-center">
                        <span class="content_font"><%= working_day %></span>
                        <p class="content_font">estimated</p>
                    </div>
                </div>
                <div class="mT105 text-center content_font">
                    <% if (!!total_working_days) { %>
                      <% if (total_working_days > 1) {%>
                         (<%= total_working_days %> working days)
                      <% } else { %>
                         (<%= total_working_days %> working day)
                      <% } %>
                   <% } %>
                </div>
            </div>
        </div>
        <!-- COLUMN 5 - PRICE -->
        <div class="col-xs-2 p0 box-170px">
            <div class="box-header">
                Price
            </div>
            <div class="box-body text-left">
                 <!-- PRINTING PRICE-->
                <div>
                    <span class="left content_font bold">Printing:</span>
                    <span class="right content_font">
                        <% if(!!printing_price) { %>
                          AED <%= _h.currency_format(printing_price) %> 
                       <% } %>
                    </span>
                </div>
               <!-- FINISHING PRICE -->
                <% if(!!finishing_price) { %>
                 <div>
                   <span class="left content_font bold">Finishing:</span>
                   <span class="right content_font">AED <%= _h.currency_format(finishing_price) %> </span>
                </div>
                <% } %>
                <span class="left content_font bold">Shipping:</span><span class="right content_font">Free Delivery</span>
                <div class="mT105_2">
                    <span class="left content_font bold">Subtotal:</span><span class="right content_font">
                      AED <%= _h.currency_format(total_price) %>
                   </span>
                </div>
            </div>
        </div>
    </div>
</div>
</script>