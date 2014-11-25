# Dex Bad Data Error Main list detail View
class App.Control.Views.Features_Dex_BadDataError_Main extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-BadDataErrorDetail'

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

        $('[data-template-target="App-Views-BadDataErrorOptionsTarget"]').html ''
        # get list of collections from the model
        option_collection_list = @model.get('printdata_errors_option_link')
        # render collection into the page
        @renderOption option_collection_list
        # return self
        @

    renderOption: (collection) =>
        # show loader
        _h.loader true
        # initliaze Features_Dex_BadDataErrors_Option list View and put the collection to be render
        badDataErrorOptionList = new App.Control.Views.Features_Dex_BadDataErrors_Option({ collection: collection, model: @model })
        # get the rendered html
        option_list = badDataErrorOptionList.render().el
        # render it into the page
        $('[data-template-target="App-Views-BadDataErrorOptionsTarget"]').append(option_list)
        # hide loader
        _h.loader false
        # return self
        @