# Features Dex PaperColors  Collection
class App.Control.Collections.Features_Dex_PaperColors extends App.Collections.Base
    model: App.Control.Models.Features_PaperColor
    url: App.Control.Vars.Dex.dex_api_url + "/api/v1/papers?action=colors"
    dataType: 'jsonp'
    
