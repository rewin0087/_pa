<!-- SYS PAPER FINISHING TYPE LIST DETAIL ITEM (MAIN)-->
<script type="text/template" id="App-Views-SysFinishingProductionsCategoryDetail">
    <td><%= id %></td>
    <td><%= code_name %></td>
    <td><%= en_name %></td>
    <td><%= ar_name %></td>
    <td>
        <a href="/features/sys/finishing-productions-category/options/<%= id %>/<%= code_name %>"  data-toggle="tooltip" data-placement="left" title="see options for <%= code_name %>" class="_tooltip">
            <span class="glyphicon glyphicon-tasks"></span>
        </a>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal" data-placement="top" title="edit <%= code_name %>" class="_tooltip">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
    </td>
</script>