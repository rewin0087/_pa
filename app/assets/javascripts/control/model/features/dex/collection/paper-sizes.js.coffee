# Features Dex PaperSizes  Collection
class App.Control.Collections.Features_Dex_PaperSizes extends App.Collections.Base
    model: App.Control.Models.Features_PaperSizes
    url: App.Control.Vars.Dex.dex_api_url + "/api/v1/papers?action=sizes"
    dataType: 'jsonp'
    
