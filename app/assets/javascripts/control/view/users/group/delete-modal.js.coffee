# Group View Delete Modal
class App.Control.Views.DeleteGroupModal extends App.Views.Base
    template: 'App-Views-DeleteGroupModal'

    events: () =>
        {        
            'click .delete' : 'deleteGroup'
        }

    deleteGroup: () =>
        @model.destroy
            success: @success
            error: @error

    success: () ->
        # show notification message
        _h.message 'success', 'Successfully deleted this group.'
        # hide modal
        $('div.delete-group-modal').modal('toggle')
    error: (model, response) ->
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

