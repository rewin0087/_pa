# Features Config DeliveryCutoffTime View Add Modal
class App.Control.Views.AddConfigDeliveryCutoffTimeModal extends App.Views.Base
    el: '#App-Views-AddConfigDeliveryCutOffTimeModal'
    
    events: () =>
        {        
            'click .save' : 'save'
        }

    save: () =>
        # show loader
        _h.loader true
        # get data
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        # add new record now
        @collection.create( 
            # data
            data, 
            # response settings
            { wait: true, success: @success, error: @error })

    success: () ->
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully saved new record.'
        # hide modal
        $('#App-Views-AddConfigDeliveryCutOffTimeModal').modal('toggle')
        # reset value
        $('#value').val('')

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

