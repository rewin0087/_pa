# Backend View Delete Modal
class App.Control.Views.Users_DeleteBackendModal extends App.Views.Base
    template: 'App-Views-DeleteBackendModal'

    events: () =>
        {        
            'click .delete' : 'deleteBackend'
        }

    deleteBackend: () =>
        @model.destroy
            success: @success
            error: @error

    success: () ->
        # show notification message
        _h.message 'success', 'Successfully deleted this backend user.'
        # hide modal
        $('div.delete-backend-modal').modal('toggle')
    error: (model, response) ->
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

