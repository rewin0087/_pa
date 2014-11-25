<!-- SYS PAPER FINISHING TYPE LIST DETAIL ITEM (MAIN)-->
<script type="text/template" id="App-Views-SysFinishingProductionsDetail">
    <td><%= id %></td>
    <td><%= info %></td>
    <td><%= en_name %></td>
    <td><%= ar_name %></td>
    <td><%= category_name %></td>
    <td>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal" data-placement="top" title="edit <%= en_name %>" class="_tooltip">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
    </td>
</script>