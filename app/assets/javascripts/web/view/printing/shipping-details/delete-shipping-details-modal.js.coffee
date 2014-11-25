# Me Address View Add Modal
class App.Web.Views.DeletePrintingShippingAddressModal extends App.Views.Base
    template: 'App-Views-DeleteShippingAddressModal'
    context: null
    
    render: () =>
        template = _.template($('#' + @template).html())
        @$el.html template()
        @

    events: () =>
        {        
            'click .delete' : 'delete'
        }
 
    delete: () =>
        _h.log 'delete'
            
    success: () ->
         # hide loader
        _h.loader false
        
        @context.refreshAddressOptions()
        
        # show notification message
        _h.message 'success', 'Successfully updated this record.'
        # hide modal
        $('div.delete-modal-shipping').modal('toggle')
        # reset name
        @$('form')[0].reset()
        @
        
    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error