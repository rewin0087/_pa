# Me Address View Delete Modal
class App.Web.Views.DeleteShippingAddressModal extends App.Views.Base
    template: 'App-Views-DeleteShippingAddressModal'

    events: () =>
        {        
            'click .delete' : 'delete'
        }

    delete: () =>
        _h.log "delete"
        @model.destroy
            success: @success
            error: @error

    success: () ->
        # show notification message
        _h.message 'success', 'Successfully deleted this record.'
        # hide modal
        $('div.delete-modal-shipping').modal('toggle')

    error: (model, response) ->
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        $('div.delete-modal-shipping').modal('toggle')
        _h.message 'error', error

