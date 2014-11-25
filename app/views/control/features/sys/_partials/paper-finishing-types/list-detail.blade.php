<!-- SYS PAPER FINISHING TYPE LIST DETAIL ITEM (MAIN)-->
<script type="text/template" id="App-Views-SysPaperFinishingTypeDetail">
    <td><%= id %></td>
    <td><%= dex_code %></td>
    <td><%= dex_en_name %></td>
    <td><%= dex_ar_name %></td>
    <td>
        <a href="/features/sys/paper-finishing-types/options/<%= id %>/<%= dex_code %>"  data-toggle="tooltip" data-placement="left" title="see options for <%= dex_code %>" class="_tooltip">
            <span class="glyphicon glyphicon-tasks"></span>
        </a>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal" data-placement="top" title="edit <%= dex_code %>" class="_tooltip">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
    </td>
</script>