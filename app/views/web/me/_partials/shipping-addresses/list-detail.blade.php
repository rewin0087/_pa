<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-ShippingAddressDetails">
    <td>
        <% if(is_corporate==1){%>Business<%}%>
        <% if(is_primary==1){%>Home<%}%>
    </td>
    <td><%= receiving_first_name %> <%= receiving_last_name %></td>
    <td><%= building_name %> <%= street %>, <%= area %> <%= city %></td>
    <td><%= mobile_number %></td>
    <td>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal-shipping">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#" id="delete" data-toggle="modal" data-target=".delete-modal-shipping">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>
</script> 