<ul class="nav nav-tabs navb" id="myTab">
    <li class="@if(Session::get('me')=='orders') active @endif"><a href="../me/orders" class="ablack"><span class="icon-cart"></span>My orders</a></li>
    <li class="@if(Session::get('me')=='info') active @endif"><a href="../me/info" class="ablack"><span class="icon-book-4"></span>My info</a></li>
    <li class="@if(Session::get('me')=='address') active @endif"><a href="../me/address" class="ablack"><span class="icon-home"></span>My addresses</a></li>
    <li class="@if(Session::get('me')=='libraries') active @endif"><a href="..me/libraries" class="ablack"><span class="icon-book"></span>My libraries</a></li>
</ul>