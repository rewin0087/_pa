<!DOCTYPE html>
<html class="control">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ @$content['title'] }}</title>
        <?= stylesheet_link_tag() ?>
    </head>
    <body class="{{ @$content['class'] }}">
        
        @if ( isset($content['header']) && $content['header'])
            <!-- HEADER -->
            <div class="header">
                @section('header')
                    {{ @$content['header'] }}
                @show
            </div>
        @endif

        <div class="wrapper row-offcanvas row-offcanvas-left">
        	<div class="content">
            	<!-- BODY -->
            	<div class="body">
                    {{ @$content['body'] }}
                </div>
                
                @if ( isset($content['footer']) && $content['footer'])
	            <!-- FOOTER -->
	            <div class="footer">
	                @section('footer')
	                    {{ @$content['footer'] }}
	                @show
	            </div>
	            @endif
        	</div>
        </div>
        
        <!-- NOTIFICATION -->
        <div class="notification-message">
            <p>Notification</p>
        </div>

        <!-- LOADER -->
        <div class="ui-loader">
            <div class="loader">
                <img src="/assets/loader.gif" alt="loader" />
                <p>loading...</p>
            </div>
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