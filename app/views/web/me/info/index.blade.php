<div class="container">
    <div class="row">
        <div class="col-xs-12">
                
                <nav class="navbar profile-color mT10" role="navigation">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header inline-list">       
                        <ul class="img-list-avatar">
                            <li>
                                <form class="avatar">
                                    <input name="_token" type="hidden" value="LTzvN7Sc41UTOg5nECWZSS0zeAUUBXrGHYEo117d">
                                    <a href="#" id="avatar_image_edit">
                                    <img class="border-image-white" src="https://secure.gravatar.com/avatar/93dbc229b15534ce4e1eaf90ae618081?s=70&amp;r=g&amp;d=mm" width="70" height="70">
                                    <span class="text-content-avatar"><span class="fa fa-pencil"></span></span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                        <ul class="li-no-decoration">
                            <li>
                                AFTAB AHMED SHAIKH
                            </li>
                            <li>
                                ID: 531008
                            </li>
                            <li>
                                CURRENT POINTS: 458
                            </li>
                        </ul>     
                    </div>
                   

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li class="horizontal-line-profile"></li>  
                        <li class="profile">
                            <a href="#" class="link-for-profile">
                                <img class="border-image-white margin-for-image" src="https://secure.gravatar.com/avatar/93dbc229b15534ce4e1eaf90ae618081?s=70&amp;r=g&amp;d=mm" width="40" height="40">
                                <p>MY ORDERS</p> 
                            </a>
                        </li> 
                        <li class="horizontal-line-profile"></li>
                        <li class="profile">
                            <a href="#" class="link-for-profile">
                                <img class="border-image-white margin-for-image-1" src="https://secure.gravatar.com/avatar/93dbc229b15534ce4e1eaf90ae618081?s=70&amp;r=g&amp;d=mm" width="40" height="40">
                                <p>MY INFO</p> 
                            </a>
                        </li>
                        <li class="horizontal-line-profile"></li> 
                        <li class="profile">
                            <a href="#" class="link-for-profile">
                                <img class="border-image-white margin-for-image-2" src="https://secure.gravatar.com/avatar/93dbc229b15534ce4e1eaf90ae618081?s=70&amp;r=g&amp;d=mm" width="40" height="40">
                                <p>MY ADDRESS BOOK</p> 
                            </a>
                        </li> 

                   
                        
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('web.me._partials.me_navigation_tab')
            <br/>
            <!--0 Tab panes -->
            <div class="tab-content tc">
                <!--put content here -->
                <!-- info content -->
                <div class="tab-pane active" id="infos">
                    <div class="col-xs-7">
                        @include('web.me._partials.info.basic_information')
                    </div>
                    <div class="col-xs-5">
                        @include('web.me._partials.info.change_email')
                        @include('web.me._partials.info.change_password')
                    </div>
                </div>
                <!-- end of info content-->
                <!-- / -->
            </div>
        </div>
    </div>
</div>

<!-- TARGET HTML OF EDIT AVATAR MODAL -->

<div data-target-template="App-Views-EditAvatarModal-Target"></div>

