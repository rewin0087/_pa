# Features Dex BadDataError  Collection
class App.Control.Collections.Features_Dex_BadDataErrors extends App.Collections.Base
    model: App.Control.Models.Features_BadDataError
    url: App.Control.Vars.Dex.dex_api_url + "/api/v1/errorlists?action=errors"
    dataType: 'jsonp'
    
