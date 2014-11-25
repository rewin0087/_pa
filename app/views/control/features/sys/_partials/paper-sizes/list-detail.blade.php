<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-SysPaperSizeDetail">
    <td><%= id %></td>
    <td><%= dex_code %></td>
    <td><%= dex_en_name %></td>
    <td><%= dex_ar_name %></td>
    <td>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal" data-placement="top" title="edit <%= dex_code %>" class="_tooltip">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
    </td>
</script>