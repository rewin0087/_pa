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
                <div class="tab-pane active" id="libraries">
                    <div class="row">
                        <div class="col-xs-4">
                            <ul class="nav nav-tabs nt3">
                                <li class="active"><a href="#sa" data-toggle="tab">Printing Cloud</a></li>
                                <li><a href="#sha" data-toggle="tab">Design Cloud</a></li>
                            </ul>
                            <br/>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group si">
                                        <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                        <button class="btn btn-danger cl" type="button">Go!</button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                            </div>
                            </br>
                            <div class="tab-content tc">
                                <div class="tab-pane active jm" id="sa"></div>
                                <div class="tab-pane jm" id="sha"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / -->
            </div>
        </div>
    </div>
</div>