<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active">
            <a href="/">
                <i class="fa fa-home"></i> <span>Home</span>
            </a>
        </li>
        <li>
            <a href="pages/widgets.html">
                <i class="fa fa-usd"></i> <span>Accounting</span> <small class="badge pull-right bg-green">new</small>
            </a>
        </li>
        <!-- ORDERS -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-tags"></i>
                <span>Orders </span><small class="badge pull-right bg-orange">maintenance</small>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-angle-double-right"></i>Current</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i>Pending</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i>Completed</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i>Settled</a></li>
            </ul>
        </li>
        <!-- PRODUCTS -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-briefcase"></i>
                <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="/products/printing"><i class="fa fa-angle-double-right"></i>Print</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i>Design</a></li>
            </ul>
        </li>
        <!-- USERS -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i> <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">                
            	<li><a href="{{ route('users.group', NULL) }}"><i class="fa fa-angle-double-right"></i>Group</a></li>
                <li><a href="{{ route('users.customers', NULL) }}"><i class="fa fa-angle-double-right"></i>Cutomers</a></li>
                <li><a href="{{ route('users.back-end', NULL) }}"><i class="fa fa-angle-double-right"></i>Back-End's</a></li>
                <li><a href="{{ route('users.access-controls', NULL) }}"><i class="fa fa-angle-double-right"></i>Access Controls</a></li>
            </ul>
        </li>
        <!-- FEATURES -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Features</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
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
                <li><a href="/features/sys/paper-finishing-types"><i class="fa fa-angle-double-right"></i>Finishing Types</a></li>
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
</section>
<!-- /.sidebar -->