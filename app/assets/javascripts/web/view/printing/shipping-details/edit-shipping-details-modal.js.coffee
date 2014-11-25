# Me Address View Add Modal
class App.Web.Views.EditPrintingShippingAddressModal extends App.Views.Base
    template: 'App-Views-EditShippingAddressModal'
    context: null
    
    render: () =>
        template = _.template($('#' + @template).html())
        @$el.html template()
        @

    events: () =>
        {        
            'click .update' : 'update'
        }
 
    update: () =>
        _h.loader true
        model = new App.Web.Models.Me_ShippingAddress()
        model.urlRoot = '/resource/me/shipping-addresses'
        form = @$el.find('form.shipping-details')
        data = _h.serializeForm form
        _h.log data
        model.save data,
            success: @success
            error: @error
            
    success: () ->
         # hide loader
        _h.loader false
        
        @context.refreshAddressOptions()
        
        # show notification message
        _h.message 'success', 'Successfully updated this record.'
        # hide modal
        $('div.edit-modal-shipping').modal('toggle')
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