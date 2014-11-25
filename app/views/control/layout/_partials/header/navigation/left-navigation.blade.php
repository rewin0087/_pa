<!-- MAIN NAVIGATION -->
<ul class="nav navbar-nav">
    <!-- ACCOUNTING -->
    <li><a href="#"><i class="fa fa-usd"></i> </i>Accounting</a></li>
    <!-- ORDERS -->
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i>&nbsp;Orders<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#"><i class="fa fa-angle-double-right"></i>Current</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>Pending</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>Completed</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>Settled</a></li>
        </ul>
    </li>
    <!-- PRODUCTS -->
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-briefcase"></i>&nbsp;Products<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="/products/printing"><i class="fa fa-angle-double-right"></i>Print</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>Design</a></li>
        </ul>
    </li>
    <!-- USERS -->
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;Users<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('users.group', NULL) }}"><i class="fa fa-angle-double-right"></i>Group</a></li>
            <li><a href="{{ route('users.customers', NULL) }}"><i class="fa fa-angle-double-right"></i>Cutomers</a></li>
            <li><a href="{{ route('users.back-end', NULL) }}"><i class="fa fa-angle-double-right"></i>Back-End's</a></li>
            <li><a href="{{ route('users.access-controls', NULL) }}"><i class="fa fa-angle-double-right"></i>Access Controls</a></li>
        </ul>
    </li>
    <!-- FEATURES -->
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dashboard"></i>&nbsp;Features<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#"><i class="fa fa-angle-double-right"></i>Mail</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>Access Controls</a></li>
            <li class="divider"></li>
            <!-- Utilities -->
            <li role="presentation" class="dropdown-header">Utilities</li>
            <li><a href="/features/utility/coupons-and-discounts"><i class="fa fa-angle-double-right"></i>Coupons and Discounts</a></li>
            <li><a href="/features/utility/promocodes"><i class="fa fa-angle-double-right"></i>Promocode</a>
            <li><a href="/features/utility/points-and-rewards"><i class="fa fa-angle-double-right"></i>Points and Rewards</a></li>
            <li><a href="/features/utility/printer-management"><i class="fa fa-angle-double-right"></i>Printer Management</a></li>
            <li class="divider"></li>
            <!-- Config -->
            <li role="presentation" class="dropdown-header">Config</li>
            <li><a href="/features/config/translations"><i class="fa fa-angle-double-right"></i>Translations</a></li>
            <li><a href="/features/config/delivery-cut-off-time"><i class="fa fa-angle-double-right"></i>Delivery Cut-off Time</a></li>
            <li><a href="/features/config/logs"><i class="fa fa-angle-double-right"></i>Logs</a></li>
            <li><a href="/features/config/calendar"><i class="fa fa-angle-double-right"></i>Calendar</a></li>
            <li><a href="/features/config/configurations"><i class="fa fa-angle-double-right"></i>Configurations</a></li>
            <li><a href="/features/config/cut-off-time-settings"><i class="fa fa-angle-double-right"></i>Cut-off Time Settings</a></li>
            <li class="divider"></li>
            <!-- System -->
            <li role="presentation" class="dropdown-header">System</li>
            <li><a href="/features/sys/paper-colors"><i class="fa fa-angle-double-right"></i>Paper Colors</a></li>
            <li><a href="/features/sys/paper-sizes"><i class="fa fa-angle-double-right"></i>Paper Sizes</a></li>
            <li><a href="/features/sys/finishing-productions-category"><i class="fa fa-angle-double-right"></i>Finishing Types</a></li>
            <li><a href="/features/sys/bad-data-errors"><i class="fa fa-angle-double-right"></i>Bad Data Errors</a></li>
            <li class="divider"></li>
            <!-- DEX -->
            <li role="presentation" class="dropdown-header">DEX</li>
            <li><a href="/features/dex/paper-colors"><i class="fa fa-angle-double-right"></i>Paper Colors</a></li>
            <li><a href="/features/dex/paper-sizes"><i class="fa fa-angle-double-right"></i>Paper Sizes</a></li>
            <li><a href="/features/dex/paper-finishing-types"><i class="fa fa-angle-double-right"></i>Finishing Types</a></li>
            <li><a href="/features/dex/bad-data-errors"><i class="fa fa-angle-double-right"></i>Bad Data Errors</a></li>
        </ul>
    </li>
</ul>