<div class="col-xs-6 pull-right">
    <!--Log in-->
    <div class="row"> 
    <div id="removeHover">
        <ul class="nav navbar-nav login login-mL100">
            @if(!Sentry::check()) 
                <li class="dropdown">
                <a href="#" id="login-trigger" class="dropdown-toggle p0 menu_width logo_align base_color login-position text-right" data-toggle="dropdown">LOGIN <b class="caret caret2"></b></a>
                <ul class="dropdown-menu w600px login-dropdown ul-dropdown-menu-2">
                    <div class="col-xs-6 form1-height">
                        @include('web.auth.register')
                    </div>
                    <div class="col-xs-6 form2-height">
                        @include('web.auth.login')
                    </div>
                </ul></li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle p0 f14 login-username text-right" data-toggle="dropdown">{{ Sentry::getUser()->email}}<b class="caret"></b></a>
                <ul class="dropdown-menu ul-dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <div class="col-xs-6 user-dropdown">
                        <li><a href="/me/orders">MY ORDERS</a></li>
                        <li><a href="/me/info">MY INFO</a></li>
                        <li><a href="/me/address">MY ADDRESS BOOK</a></li>
                        <li class="divider-2"></li>
                        <li><a href="/me/libraries">MY CLOUD DATA</a></li>
                        
                    </div>
                </ul>
            </li>
            @endif

        </ul> 
    </div>
        <!-- Search Box-->
        <div class="col-xs-7 right">
            <form id="header-searchform" action="" class="pull-right">
                <div class="input-group">
                    <input type="text" placeholder="" class="input-sm form-control searchcorner" />
                    <div class="input-group-btn">
                        <button class="btn btn_btn2">
                            <span class="icon-search-1"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>           
</div>