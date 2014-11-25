<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-ProductPrintingPaperTypeDetail">
    <td><%= id %></td>
    <td><%= en_name %></td>
    <td>
        <!-- Finishing File -->
        <% if (!!finishing_file == true) { %>
            <a href="/products/printing/paper-types/{{ $print_product_id }}/download/excel/<%= finishing_file.id%>/<%= en_name %>" data-placement="top" title="Download <%= en_name %>" class="_tooltip"> 
                <%= finishing_file.original_name %>
                <span class="glyphicon glyphicon-save mLeft-10"></span>
            </a>
        <% } else { %>
            no-file
        <% } %>
    </td>
    <td>
        <!-- Pricing File -->
        <% if (!!pricing_file == true) { %>
            <a href="/products/printing/paper-types/{{ $print_product_id }}/download/excel/<%= pricing_file.id%>/<%= en_name %>" data-placement="top" title="Download <%= en_name %>" class="_tooltip" > 
                <%= pricing_file.original_name %>
                <span class="glyphicon glyphicon-save mLeft-10"></span>
            </a>
        <% } else { %>
            no-file
        <% } %>
    </td>
    <td>
        <% if (!!pricing_file == true && !!finishing_file == true) { %>
            <a href="/products/printing/paper-types/<%= id %>/reloading/<%= en_name %>" data-placement="top" title="reload <%= en_name %>" class="_tooltip">
                <span class="glyphicon glyphicon-refresh"></span>
            </a>
        <% } %>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal" data-placement="top" title="Edit <%= en_name %>" class="_tooltip">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#" id="delete" data-toggle="modal" data-target=".delete-modal" data-placement="top" title="Delete <%= en_name %>" class="_tooltip">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
       
    </td>
</script>