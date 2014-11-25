<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-GroupDetail">
    <td><%= id %></td>
    <td><%= name %></td>
    <td>
        <a href="#" id="edit_group" data-toggle="modal" data-target=".edit-group-modal">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#" id="delete_group" data-toggle="modal" data-target=".delete-group-modal">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>
</script>