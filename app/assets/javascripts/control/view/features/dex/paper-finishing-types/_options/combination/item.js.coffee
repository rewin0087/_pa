# Dex Paper Finishing Type Option Combination list item View
class App.Control.Views.Features_Dex_PaperFinishingType_Option_Combination extends App.Views.Base
    template: 'App-Views-PaperFinishingTypeCombinationDetail'

    initialize: () =>
        @model.on 'destroy', @unRender, @
        
    events: () ->
        {
            'click .remove' : 'removeCombination'
        }

    removeCombination: (e) =>
        # show loader
        _h.loader true
        e.preventDefault()
        # destroy model
        @model.destroy()
        # return self
        @

    unRender: () =>
        # remove from html this current record
        @remove()
        
        disParent = @parent
        # reRender Parent View
        setTimeout () ->
            disParent.reRender()
            # hide loader
            _h.loader false
        , 100
        # return self
        @
    

