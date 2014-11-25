# Backend View Add Modal
class App.Control.Views.Users_AddBackendModal extends App.Views.Base
    el: '#App-Views-AddBackendModal'

    events: () =>
        {        
            'click .save' : 'saveBackend'
        }

    saveBackend: () =>
        # show loader
        _h.loader true
        # get data
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        # add new backend now
        @collection.create(
            # data
            data, 
            # response settings
            { wait: true, success: @success, error: @error }
        )

    success: () =>
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully created new Admin staff.'
        # hide modal
        $('#App-Views-AddBackendModal').modal('toggle')
        # reset fields
        @$el.find('form')[0].reset()
    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

