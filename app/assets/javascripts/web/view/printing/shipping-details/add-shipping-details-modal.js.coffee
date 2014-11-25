# Me Address View Add Modal
class App.Web.Views.AddPrintingShippingAddressModal extends App.Views.Base
    template: 'App-Views-AddShippingAddressModal'
    context: null
  
    render: () =>
        template = _.template($('#' + @template).html())
        @$el.html template()
        @    

    events: () =>
        {        
            'click .save' : 'save'
        }
    
    save: () =>
        collection = new App.Web.Collections.Me_ShippingAddresses()
        form = @$el.find('form')
        data = _h.serializeForm form
        collection.create( 
            # data
            data, 
            # response settings
            { wait: true, success: @success, error: @error })

    success: () =>
        # hide loader
        _h.loader false
        # refresh address list
        @context.refreshAddressOptions()
        # show notification message
        _h.message 'success', 'Successfully saved new record.'
        $('div.add-modal-shipping').modal('toggle')
        $('div.shipping-address').show()
        @
    
    error: (model, response) ->
        # hide loader
        _h.log 'Error'
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

