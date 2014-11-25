 <!--  FINISHING CATEGORY ITEM -->
<script type="text/template" id="App-Views-Finishing-Category-Item">
    <button type="button" class="button-modal btn-sm show-finishing-productions" data-toggle="modal" data-target="#finishing-production-modal">
        <span class="pull-left fa-circle-o fa is-checked" id="finishing-category-<%= id %>"></span>
        <span class="pull-left code_name_<%= id %>" data-code-name="<%= code_name %>"><%= code_name %></span>
    </button>
</script>