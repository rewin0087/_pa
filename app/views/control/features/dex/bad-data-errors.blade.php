<div class="col-md-6" id="bad-data-error-holder">
    <!-- BAD DATA ERROR LIST -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Bad Data Error (DEX)</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20">
                <thead class="theadcolor">
                    <tr>
                        <th width="50px">id</th>
                        <th>Code Name</th>
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
<div class="col-md-6">
    <!-- BAD DATA ERROR OPTIONS TARGET -->
    <div data-template-target="App-Views-BadDataErrorOptionsTarget" class="mBottom-30"></div>
</div>

<!-- BAD DATA ERROR OPTIONS LIST -->
@include('control.features.dex._partials.bad-data-errors.option.list')

<!-- BAD DATA ERROR LIST OPTION DETAIL ITEM (_OPTION) -->
@include('control.features.dex._partials.bad-data-errors.option.list-detail')

<!-- BAD DATA ERROR LIST DETAIL ITEM (MAIN)-->
@include('control.features.dex._partials.bad-data-errors.list-detail')

