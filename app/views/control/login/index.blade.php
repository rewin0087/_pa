<!DOCTYPE html>
<html class="control">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ @$title }}</title>
        <?= stylesheet_link_tag() ?>
    </head>
    <body class=" skin-black fixed {{ @$class }}">
        <div id="back-bgcolor" class="bgcolorback">&nbsp;</div>
        <div class="login-wrapper ag">
            <div class="top-wrapper">
                <div class="layout center-block mar">
                    <a href="http://printarabia.ae" title="">
                        <div class="logo center-block"></div>
                    </a>
                    <div class="form-wrapper center-block" id="login-form">
                        <div class="center-block hayt">
                            <div class="inside extend">
                                <p class="text-center form-caption">
                                    ADMINISTRATOR<small>Login</small>
                                </p>
                                <hr/>
                            </div>
                            <div class="inside mak">
                                <form method="POST" action="#" accept-charset="UTF-8">
                                    <input name="_token" type="hidden" value="#">         
                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control fc2" placeholder="Email" value="" required="" autofocus="">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control fc2" placeholder="Password" value="" required="">
                                        <a href="#" class="help-block text-right">Forgotten your password?</a>
                                    </div>
                                    <div class="form-inline">
                                        <button class="btn-primary create-account btn btn2 btn-cus2" data-trigger-login="">Login</button>
                                        <div class="checkbox">
                                            <label for="remember-in">
                                            <input name="remember" type="checkbox" value="1">Remember me on this computer                 
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- NOTIFICATION -->
        <div class="notification-message">
            <p>Notification</p>
        </div>
        <script type="text/javascript">
            var settings = {
              Models: {},
              Collections: {},
              Views: {},
              Vars: {}
            };
            
            var App = {
              Models: {},
              Collections: {},
              Views: {},
              Vars: {},
              Control: settings,
              Web: settings    
            };
            
            App.Control.Vars.Dex = {};  
            App.Control.Vars.Dex.dex_api_url = "{{  Config::get('dex.v1.DEX_API.DOMAIN') }}";
            App.Web.Vars.Dex = {};  
            App.Web.Vars.Dex.dex_api_url = "{{  Config::get('dex.v1.DEX_API.DOMAIN') }}";
            
        </script>
        <?= javascript_include_tag() ?>
    </body>