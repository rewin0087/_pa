<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-UtilityPromocodeDetail">
    <td><%= id %></td>
    <td>
        <span class="label label-warning"><%= code %></span>
    </td>
    <td>
        <% if(type == 1) { %>
            SUBMISSION_TIME_DISCOUNT
        <% } else if(type == 2) { %>
            PERIOD_DISCOUNT
        <% } else { %>
            REGULAR_DISCOUNT
        <% } %>
    </td>
    <td>
        null
    </td>
    <td>
        <%= date_from %>
        <%= time_from %>
    </td>
    <td>
        <%= date_to %>
        <%= time_to %>
    </td>
    <td>
        <%= promocode_used_in.length %>
    </td>
    <td>
        <% if(enabled == 1) {%>
            <a href="#" id="disable" class="label label-success _tooltip"  data-toggle="tooltip" data-placement="left" title="Disable <%= code %> promocode?">ENABLED</a>
        <% } else if(enabled == 0) { %>
            <a href="#" id="enable" class="label label-danger _tooltip" data-toggle="tooltip" data-placement="left" title="Enable <%= code %> promocode?">DISABLED</a>
        <% } %>
    </td>
</script>