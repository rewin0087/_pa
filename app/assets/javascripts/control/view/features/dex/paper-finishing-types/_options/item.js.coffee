# Dex Paper Finishing Type Option list detail View
class App.Control.Views.Features_Dex_PaperFinishingType_Option extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-PaperFinishingTypeOptionDetail'
    # parent model
    parent: null
    # combination collection
    combination_collection: new App.Control.Collections.Features_Dex_PaperFinishingTypes()
    events: () ->
        {        
            'click .select-option' : 'selectOption'
        }

    selectOption: (e) =>
        e.preventDefault()
        # parent code name
        parent_code = @parent.get('code_name')
        # current code name
        current_code = @model.get('code_name')
        # combination code
        combination_code = parent_code + ":" + current_code
        # set combination model
        combination_code_model = new App.Control.Models.Features_PaperFinishingType({ code: combination_code, current_model: @model, parent_model: @parent})
        # add combination to the collection
        @combination_collection.add(combination_code_model)
        # render combination
        @renderCombinations()
        # return self
        @

    renderCombinations: () =>
        # initialize Combination list view manager
        combinationListView = new App.Control.Views.Features_Dex_PaperFinishingType_Option_Combinations({ collection: @combination_collection })
        # render combination to list view
        combinationListView.renderToList().el
        # render combination to form view
        combinationListView.renderToForm().el
        # return self
        @
       

