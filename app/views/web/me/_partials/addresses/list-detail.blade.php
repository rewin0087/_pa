<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-AddressDetails">
    <td>
        <% if(is_corporate==1){%>Corporate<%}%>
        <% if(is_primary==1){%>Residential<%}%>
    </td>
    <td><%= receiving_first_name %> <%= receiving_last_name %></td>
    <td><%= company_name %></td>
    <td><%= address %></td>
    <td><%= telephone_number %></td>
    <td>
        <a href="#" id="edit" data-toggle="modal" data-target=".edit-modal">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#" id="delete" data-toggle="modal" data-target=".delete-modal">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>
</script> 