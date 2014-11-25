# Me Email View list
class App.Web.Views.Me_Emails extends App.Views.Base
    template: 'App-Views-EditEmail'
      
    events: () =>
        {        
            'click .update' : 'update'
            'click .send_verification' : 'send_verification'
        }
    update: () =>
        _h.log 'edit'
         # show loader
        _h.loader true
        # get data
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        # add new group now
        @model.save data,
            success: @success
            error: @error

    success: () ->
         # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Email Sucessfully Updated!'
        # hide modal
        # $('div.edit-modal').modal('toggle')
        # reset name
        # @$('form')[0].reset()

    send_verification: () =>
        _h.log 'send email send_verification'

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error