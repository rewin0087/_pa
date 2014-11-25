<script type="text/template" id="App-Views-Web-Product-Printing-Item">
    <div class="borL"></div>     
    <div class="row">
        <!-- IMAGE -->
        <div class="col-xs-4 p0">
            <div class="pull-right select-product-image">
                <% if (!!image) { %>
                <img src="/media/image/<%= image.id %>/<%= image.original_name %>" class="product-main-image col-xs-12" />
                <% } %>
                <% if (!!hover_image) { %>
                <img src="/media/image/<%= hover_image.id %>/<%= hover_image.original_name %>" class="product-hover-image col-xs-12" />
                <% } %>
            </div>
        </div>
        <!-- DETAILS -->
        <div class="col-xs-8">
            <!-- NAME -->
            <a href="/resource/print/select-products/<%= id %>" class="select-product product_name">
                <p class="prod-title">
                    <%= en_name %>
                </p>
            </a>
            
            <!-- DESCRIPTION -->
            <p class="prod-description">
                <%= en_description.length > 70 ? en_description.substring(1, 69) + "..." : en_description %>
            </p>
            <a href="/printing/product/<%= id %>/detail/<%= en_name %>"><div class="btn btn-xs moreinfo">MORE INFO</div></a>
        </div>
    </div>
</script>