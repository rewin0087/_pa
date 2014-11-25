# Dex Bad Data Error Main list View
class App.Control.Views.Features_Dex_BadDataErrors_Main extends App.Views.Collection
    el: '#bad-data-error-holder'
    counter: 0
    
    initialize: () =>
        @on('clearActiveRows', @clearActiveRows)

    events: () ->
        {
            'click .show-options' : 'clearActiveRows'
            'click .update-definition' : 'updateDefinition'
        }
    clearActiveRows: () =>
        @$el.find('tr').removeClass('active')
        # return self
        @

    render: () =>
        @$el.find('tbody').html ''
        @collection.each(@addOne, @)
        @

    addOne: (model) =>
        # counter
        @counter++
        # set position to be the counter
        model.set('position', @counter)
        # initialize badDataErrorMainView view
        badDataErrorMainView = new App.Control.Views.Features_Dex_BadDataError_Main( { model: model } )
        # empty dataTable content
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.find('tbody').append(badDataErrorMainView.render().el)
        # return self
        @

    updateDefinition: () =>
        # show loader
        _h.loader true
        # set rest url of the collection
        @collection.url = '/resource/features/dex/bad-data-errors'
        # save each definitions
        Backbone.sync('create', @collection, { success: @successUpdate, error: @errorUpdate })
        # return self
        @

    successUpdate: (collection, response) =>
        # hide loader
        _h.loader false
        _h.log 'updated'
        # show notification
        _h.message 'success', 'Successfully updated the definitions.'
        # return self
        @

    errorUpdate: (response) =>
        # hide loader
        _h.loader false
        _h.log response
        # show notification message
        # get error from the response
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error