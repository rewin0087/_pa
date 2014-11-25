# Features Dex PaperFinishingTypes  Collection
class App.Control.Collections.Features_Dex_PaperFinishingTypes extends App.Collections.Base
    model: App.Control.Models.Features_PaperFinishingType
    url: App.Control.Vars.Dex.dex_api_url + "/api/v1/papers?action=productions"
    dataType: 'jsonp'

    add: (model) =>
        # check if its already exist
        isDuplicated = @any (_model) ->
            _model.get('code') == model.get('code')
        # if not exist add it into the collection
        if !isDuplicated
            Backbone.Collection.prototype.add.call(@, model);
        # return self
        @
