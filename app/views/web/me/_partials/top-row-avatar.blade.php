<div data-target="me-avatar"></div>
<script type="text/template" id="App-Views-ListAvatar"> 
    <div class="col-sm-6">
        <div class="container-fluid avatar-wrapper">
            <div class="row">
                <div class="col-xs-3 no_padding">
                    <div id="step-content2">
                        <div id="order-faqs2" >
                            <ul class="img-list-avatar">
                                <li>
                                    <form class='avatar'>
                                        {{ Form::token() }}
                                        <div class="borL"></div>
                                        <a href="#" id="avatar_image_edit">
                                        <img class="border-image-white" src="https://secure.gravatar.com/avatar/93dbc229b15534ce4e1eaf90ae618081?s=70&amp;r=g&amp;d=mm" width="100" height="100">
                                        <span class="text-content-avatar"><span class="fa fa-pencil"></span></span>
                                        </a>
                                    </form>
                                </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-9">
                    <h5>
                        Customer Name: <%= user_info.first_name %> <%= user_info.last_name %>  
                    </h5>
                    <h5>
                        Customer ID: <%= user_info.user_id %>  
                    </h5>
                    <h5>
                        Remaining points: <%= user_info.remaining_points %>                         
                    </h5>
                </div>
            </div>
        </div>
    </div>
</script>