# Dex Paper Finishing Type Main list detail View
class App.Control.Views.Features_Dex_PaperFinishingType_Main extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-PaperFinishingTypeDetail'

    events: () ->
        {        
            'click .show-options' : 'showListOptions'
        }

    showListOptions: (e) =>
        e.preventDefault()
        # add class of the current row
        dis = @$el
        setTimeout ()->
            dis.addClass('active')
        , 200

        $('[data-template-target="App-Views-PaperFinishingTypeOptionsTarget"]').html ''
        # get list of collections from the model
        option_collection_list = @model.get('options')
        # render each collection into the page
        _.map option_collection_list, @renderOption, @
        # return self
        @

    renderOption: (collection) =>
        # show loader
        _h.loader true
        # initliaze Dex_PaperFinishingTypes_Option View and put the collection to be render
        paperFinishingTypeOptionList = new App.Control.Views.Features_Dex_PaperFinishingTypes_Option({ collection: collection, model: @model })
        # get the rendered html
        option_list = paperFinishingTypeOptionList.render().el
        # render it into the page
        $('[data-template-target="App-Views-PaperFinishingTypeOptionsTarget"]').append(option_list)
        # hide loader
        _h.loader false
        # return self
        @


