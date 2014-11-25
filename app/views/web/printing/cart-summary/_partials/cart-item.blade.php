<!-- CART ITEM VIEW -->
<script type="text/template" id="App-Views-Cart-Summary-Item">
   <div>
      <!-- COLUMN 1 - PRODUCT -->
      <div class="col-xs-3 p0 box-200px">
         <div class="box-header-products">
            Product
         </div>
         <div class="box-body-products text-left line_height">
            <div class="row">
               <div class="col-xs-12 flyers">
                  <%= item.product.en_name %>
               </div>
            </div> 
            <br>
            <div class="row">
               <div class="col-xs-4">
                  <img src="/media/image/<%= item.product.file_upload_id %>/product" class="image_product" style="width: 70px; height: 60px;">
               </div>
               <div class="col-xs-8 add_name text-right">
                  <a href="#" class="link_font update-name" data-toggle="modal" data-target="#item-given-name">
                     <%= !!item.item_given_name && item.item_given_name.cart_item_name != '' ? item.item_given_name.cart_item_name : 'ADD NAME' %> &nbsp;&nbsp;
                  </a>
                  <i class="fa fa-pencil-square text-primary"></i>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-12 dup_rem">
                  <small>
                     <!-- DUPLICATE -->
                     <a href="#" data-toggle="modal" data-target="#duplicateModal" class="link_font duplicate-item">
                        <span class="fa fa-plus-circle text-danger"></span>
                        DUPLICATE
                     </a>
                     <!-- REMOVE -->
                     <a href="#" data-toggle="modal" data-target="#rmvModal" class="link_font remove-item">
                         <span class="mLeft5 fa fa-minus-circle text-success"></span>
                        REMOVE
                     </a>
                  </small>
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
            <span class="bold content_font">Size: &nbsp; <%= item.paper_size.dex_en_name %></span><br/>
            <a class="link-edit edit-order-details content_font" href="#">Edit</a>
            <!-- PAPER QUANTITY -->
            <span class="bold content_font">Quantity: &nbsp; <%= item.quantity_price.quantity %></span><br/>
            <!-- PAPER COLOR -->
            <span class="bold content_font">Colors: &nbsp; <%= item.paper_color.dex_en_name %></span><br/>
            <!-- PAPER TYPE -->
            <span class="bold content_font">Paper: &nbsp; <%= item.paper_type.en_name %> </span><br/>
         </div>
      </div>
      <!-- COLUMN 3 - DATA -->
      <div class="col-xs-2 p0 box-180px">
         <div class="box-header">
            Data
         </div>
         <div class="box-body text-left line_height2">
            <!-- PRINT DATA -->
            <span class="bold  content_font text-success">Print Data:</span><br/>
            <div class="mT5 ellipsis_file">
               <!-- TRIGGER -->
               <button class="red btn btn-xs left print_data_trigger" data-toggle="modal" data-target="#printDataModal">
                  <%= !!item.print_data ? 'Change' : 'Upload' %>
               </button>
               <!-- FILE NAME -->
               <span class="content_font2 mL5">
                  <%= !!item.print_data ? item.print_data.original_name : '&nbsp; No File' %>
               </span> 
               <span class="icon-warning blue_gly content_font2"></span>
            </div>
            <hr/>
            <!-- PROOF DATA -->
            <span class="bold content_font">Proof of Data:</span><br/>
            <div class="mT5 ellipsis_file"> 
               <!-- TRIGGER -->
               <button class="red btn btn-xs left proof_data_trigger" data-toggle="modal" data-target="#proofDataModal">
                  <%= !!item.proof_data ? 'Change' : 'Upload' %>
               </button>
               <!-- FILE NAME -->
               <span class="content_font2 mL5">
                  <%= !!item.proof_data ? item.proof_data.original_name : '&nbsp; No File' %>
               </span> 
               <span class="icon-warning blue_gly content_font2"></span>
            </div>
            <div class="mT5">
               <small>
                  <span class="fa fa-plus-circle text-danger"></span>
                  <a href="#" class="link_font update_note">
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
         <div class="box-header-price">
            Price
         </div>
         <div class="box-body-price text-left">
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
</script>