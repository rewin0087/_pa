<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-ProductPrintingDetail">
    <td><%= id %></td>
    <td><%= en_name %></td>
    <td><%= ar_name %></td>
    <td>
        <a href="/products/printing/paper-type/<%= id %>/<%= en_name %>"  data-toggle="tooltip" data-placement="left" title="see paper type for <%= en_name %>" class="_tooltip">
            <span class="glyphicon glyphicon-tasks"></span>
        </a>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#" id="delete" data-toggle="modal" data-target=".delete-modal">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
       
    </td>
</script>