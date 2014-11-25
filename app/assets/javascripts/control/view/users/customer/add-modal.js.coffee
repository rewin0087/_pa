# Customer View Add Modal
class App.Control.Views.Users_AddCustomerModal extends App.Views.Base
    el: '#App-Views-AddCustomerModal'

    events: () =>
        {        
            'click .save' : 'saveCustomer'
        }

    saveCustomer: () =>
        # show loader
        _h.loader true
        # get data
        email = @$('#email-address').val()
        first_name = @$('#first-name').val()
        last_name = @$('#last-name').val()
        # add new customer now
        @collection.create(
            # data
            { email: email, first_name: first_name, last_name: last_name }, 
            # response settings
            { wait: true, success: @success, error: @error }
        )

    success: () ->
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully added new customer.'
        # hide modal
        $('#App-Views-AddCustomerModal').modal('toggle')
        # reset fields
        @$('form')[0].reset()
        
    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error
        responseContent = response.responseJSON

        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

