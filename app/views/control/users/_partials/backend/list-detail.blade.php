<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-BackendDetail">
    <td><%= id %></td>
    <td><%= first_name %> <%= last_name %></td>
    <td><%= email %></td>
    <td>
        <a href="#" id="edit_backend" data-toggle="modal" data-target=".edit-backend-modal">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#" id="delete_backend" data-toggle="modal" data-target=".delete-backend-modal">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
       
    </td>
</script>