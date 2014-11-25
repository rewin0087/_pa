<div class="row mT10 text-left">
    <div class="col-xs-12 p0 box-230px">
        <div class="box-header1">
            Shipment
        </div>
        <span class="col-xs-12 form-content hide">
        </span>
        <div class="box-body1 text-left fsheight">
            <div class="container-fluid">
                <div class="row shipping-wrapper">
                    <div class="col-xs-12 section section-right shipfrom-wrapper">
                        <h4 class="caption text-blue">
                            Ship To<a href="#" class="tooltips" title="Put something about this question mark...">
                            <i class="fa fa-question-circle"></i>
                            </a>
                        </h4>
                        <div class="row">
                            <div class="col-xs-12 content_font">
                                <% if (!!shipping_address) { %>
                                <div>
                                    <!-- NAME -->
                                    <p>
                                        <strong>
                                            <span><%= shipping_address.receiving_first_name + " " + shipping_address.receiving_last_name %></span>
                                            <% if(shipping_address.is_primary == 1) { %>
                                                <span>(Residential)</span>
                                            <% } else if(shipping_address.is_corporate == 1) { %>
                                                <span>(Corporate)</span>
                                            <% } %>
                                        </strong>
                                    </p>
                                    <!-- ADDRESS -->
                                    <p>
                                        <strong>ADDRESS:</strong>  
                                        <span>
                                            <%= !!shipping_address.building_name ? shipping_address.building_name + " " : '' %>
                                            <%= !!shipping_address.city ? shipping_address.city + ", "  : '' %>
                                            <%= !!shipping_address.country ? shipping_address.country : '' %>
                                        </span>
                                    </p>
                                    <!-- NEAREST LANDMARK -->
                                    <% if (!!shipping_address.nearest_landmark) { %>
                                        <p>
                                            <strong>NEAREST LANDMARK:</strong> 
                                            <span><%= shipping_address.nearest_landmark %></span>
                                        </p>
                                    <% } %>
                                    <!-- COMPANY NAME -->
                                    <% if(!!shipping_address.company_name) { %>
                                        <p>
                                            <strong>COMPANY:</strong> 
                                            <span><%= shipping_address.company_name %></span>
                                        </p>
                                    <% } %>
                                    <!-- TELEPHONE NUMBER -->
                                    <p>
                                        <strong>TEL:</strong> 
                                        <span><%=  shipping_address.telephone_number %></span>
                                    </p>
                                    <!-- MOBILE NUMBER -->
                                    <p>
                                        <strong>MOBILE:</strong> 
                                        <span><%=  shipping_address.mobile_number %></span>
                                    </p>
                                </div>
                                <% } %>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>