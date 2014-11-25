
<div class="col-md-12" id="paper-size-holder">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Paper Size (DEX)</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20">
                <thead class="theadcolor">
                    <tr>
                        <th width="30px">id</th>
                        <th>Size Code</th>
                        <th>Name (en)</th>
                        <th>Name (jp)</th>
                    </tr>
                </thead>
                <tbody class="tbodycolor">
                   <!-- Render the collection here -->
                   <tr>
                       <td colspan="4">
                           <p class="center">No records found.</p>
                       </td>
                   </tr>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <a href="#" class="btn btn-primary update-definition">
                    <span class="glyphicon glyphicon-retweet"></span>
                    Update Definitions
                </a>
            </div>
        </div>
    </div>
</div>

<!-- LIST DETAIL ITEM -->
<script type="text/template" id="App-Views-PaperSizeDetail">
    <td><%= position %></td>
    <td><%= size_code %></td>
    <td><%= name_en %></td>
    <td><%= name_jp %></td>
</script>

