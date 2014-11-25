# Dex Paper Finishing Type Option Combination View
class App.Control.Views.Features_Dex_PaperFinishingType_Option_Combinations extends App.Views.Collection
    array: []
    
    initialize: () =>
        @collection.on 'reset', @refreshView, @

    events: () ->
        {
            'click .reset' : 'resetCombination'
        }

    # render combination as a list
    renderToList: () =>
        # set element to list
        @setElement('#combination-container')
        # empty html everytime render is requested
        @$el.html ''
        # loop each model and render the data to list item
        _.map @collection.models, @_renderToListItem, @
        # return self
        @
    
    # render combination in the form
    renderToForm: () =>
        # set element to form
        @setElement('#combination-box')
        # empty html everytime render is requested
        @$el.find('textarea').html ''
        # empty the array
        @array = []
        # loop each model, get the code and put it in array
        _.map @collection.models, @_getCode, @
        # convert array to string
        combination = @array.join ' | '
        # render to form
        @$el.find('textarea').html combination
        # return self
        @

    # render to list item view
    _renderToListItem: (model) =>
        # initialize Features_Dex_PaperFinishingType_Option_Combination to render in list item view
        combinationListItemView = new App.Control.Views.Features_Dex_PaperFinishingType_Option_Combination({ model: model })
        combinationListItemView.parent = @
        # append rendered item
        @$el.append(combinationListItemView.render().el)
        # return slef
        @

    # flatten the collection by getting the code inside the model and add them to array
    _getCode: (model) =>
        # push code to array
        @array.push model.get('code')
        # return salf
        @

    # reset combination
    resetCombination: () =>
        # reset collection
        @collection.reset()
        # hide loader
        _h.loader false
        # return self
        @

    reRender: () =>
        # reRender List
        @renderToList()
        # re Render Form
        @renderToForm()
        @

    refreshView: () =>
        # reRender View
        @reRender()
        # return self
        @