# Features Config DeliveryCutoffTime View Delete Modal
class App.Control.Views.DeleteConfigDeliveryCutoffTimeModal extends App.Views.Base
    template: 'App-Views-DeleteConfigDeliveryCutOffTimeModal'

    events: () =>
        {        
            'click .delete' : 'delete'
        }

    delete: () =>
        @model.destroy
            success: @success
            error: @error

    success: () ->
        # show notification message
        _h.message 'success', 'Successfully deleted this record.'
        # hide modal
        $('div.delete-modal').modal('toggle')
        
    error: (model, response) ->
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

