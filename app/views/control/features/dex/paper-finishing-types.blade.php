
<div class="col-md-9" id="paper-finishing-type-holder">
    <div class="row">
        <!-- PAPER FINISHING TYPE LIST -->
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Paper Finishing Type (DEX)</h3>
                </div>
                <div class="box-body">
                    <!-- LIST -->
                    <table class="table table-bordered table-hover mTop-20" >
                        <thead class="theadcolor">
                            <tr>
                                <th>id</th>
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
        <!-- PAPER FINISHING TYPE OPTIONS TARGET -->
        <div class="col-md-6">
            <div data-template-target="App-Views-PaperFinishingTypeOptionsTarget"></div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="combinations">
        <!-- COMBINATIONS -->
        <div class="row">
            <div class="col-md-12">
                <h5>Current Combinations</h5>
            </div>
            <div id="combination-container">
                <!-- INSERT COMBINATION HERE -->
            </div>
        </div>
        <!-- COMBINATION BOX -->
        <div class="row" id="combination-box">
            <div class="col-md-12 mTop-30">
                <textarea class="form-control hightlight-text" readonly="readonly" placeholder="Combinations"></textarea>        
            </div>
            <div class="col-md-12 mTop-10">
                <button class="btn btn-default reset">Reset</button>
            </div>
        </div>
    </div>
</div>

<!-- PAPER FINISHING TYPE COMBINATION DETAIL -->
@include('control.features.dex._partials.paper-finishing-types.option.combination.list-detail')

<!-- PAPER FINISHING TYPE OPTIONS LIST -->
@include('control.features.dex._partials.paper-finishing-types.option.list')

<!-- PAPER FINISHING TYPE LIST OPTION DETAIL ITEM (_OPTION) -->
@include('control.features.dex._partials.paper-finishing-types.option.list-detail')

<!-- PAPER FINISHING TYPE LIST DETAIL ITEM (MAIN)-->
@include('control.features.dex._partials.paper-finishing-types.list-detail')

