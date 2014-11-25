<div class="container">
    <div class="row">
        <div class="col-xs-12">
             @if($errors->has('profile'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ $errors->first('profile', ':message') }}
                </div>
            @endif
            <div class="panel panel-default panel-margin-top">
                <div class="panel-body jumbocolor">
                    <div class = "row">
                        @include('web.me._partials.top-row-avatar')
                        @include('web.me._partials.top-row-storage')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('web.me._partials.me_navigation_tab')
            <br/>
            <!--0 Tab panes -->
            <div class="tab-content tc">
                <!--put content here -->
                <div class="tab-pane active" id="orders">
                    <div class="row">
                        <div class="col-xs-4">
                            <!-- 2 Tab inside Tab-->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nt">
                                <li class="active">
                                    <a href="#ao" data-toggle="tab">
                                    Active Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="#oh" data-toggle="tab">
                                    Order History
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tc">
                                <!--3 Tab inside Tab Content-->
                                <div class="tab-pane active jm" id="ao">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead  class="theadcolor">
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Order No.
                                                </th>
                                                <th>
                                                    Product
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Fee
                                                </th>
                                                <th>
                                                    Shipping Date
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX text-center">
                                                <td colspan="10">
                                                    No Records Found
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane jm" id="oh">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead  class="theadcolor">
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Archieved
                                                </th>
                                                <th>
                                                    Order No.
                                                </th>
                                                <th>
                                                    Product
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Cost
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX text-center">
                                                <td colspan="10">
                                                    No Records Found
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Standard button with label -->
                                <button type="button" class="btn btn-labeled btn-default">
                                <span class="btn-label">
                                <i class="glyphicon glyphicon-arrow-left">
                                </i>
                                </span>
                                Previous
                                </button>
                                <!-- Standard button with label on the right side -->
                                <button type="button" class="btn btn-labeled btn-default">
                                Next
                                <span class="btn-label btn-label-right">
                                <i class="glyphicon glyphicon-arrow-right">
                                </i>
                                </span>
                                </button>
                                <br/>
                                <!-- 3 end-->
                            </div>
                            <!-- 2 end -->
                        </div>
                    </div>
                </div>
                <!-- / -->
            </div>
        </div>
    </div>
</div>
