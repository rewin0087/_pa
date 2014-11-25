<!DOCTYPE html>
<html class="web">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ @$content['title'] }}</title>
        <?= stylesheet_link_tag() ?>
    </head>
    <body class="{{ @$content['class'] }}">
        <!-- HEADER -->
        <div class="header">
            @section('header')
                {{ @$content['header'] }}
            @show
        </div>
        <!-- BODY -->
        <div class="body">
            @yield('body')
            {{ @$content['body'] }}
        </div>
        <!-- FOOTER -->
        <div class="footer">
            @section('footer')
                {{ @$content['footer'] }}
            @show
        </div>
        
        <!-- LOADER -->
        <div class="ui-loader">
            <div class="loader">
                <img src="/assets/web-loader.gif" class="el" alt="loader" />
                <p class="el mL10">PLEASE WAIT...</p>
            </div>
        </div>

        <!-- NOTIFICATION -->
        <div class="notification-message">
            <p>Notification</p>
        </div>

        <script type="text/javascript">

            var App = {
                Models: {},
                Collections: {},
                Views: {},
                Vars: {},
                Control: {
                    Models: {},
                    Collections: {},
                    Views: {},
                    Vars: {}
               },
                Web: {
                    Models: {},
                    Collections: {},
                    Views: {},
                    Vars: {}
               }    
            };
            
            App.Control.Vars.Dex = {};  
            App.Control.Vars.Dex.dex_api_url = "{{  Config::get('dex.v1.DEX_API.DOMAIN') }}";
            App.Web.Vars.Dex = {};  
            App.Web.Vars.Dex.dex_api_url = "{{  Config::get('dex.v1.DEX_API.DOMAIN') }}";
        </script>
        <?= javascript_include_tag() ?>
    </body>
</html>