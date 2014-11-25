<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-ConfigCutOffTimeSettingsDetail">
    <td><%= id %></td>
    <td><%= label %></td>
    <td><%= value %></td>
    <td>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#" id="delete" data-toggle="modal" data-target=".delete-modal">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>
</script>