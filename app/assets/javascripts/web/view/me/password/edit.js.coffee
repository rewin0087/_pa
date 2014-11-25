# Me Password View list
class App.Web.Views.Me_Passwords extends App.Views.Base
    template: 'App-Views-EditPassword'
    
    events: () =>
        {        
            'click .update' : 'update'
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
        _h.message 'success', 'Password Sucessfully Updated!'
        #reset values
        $('#current_password').val('')
        $('#new_password').val('')
        $('#confirm_password').val('')
    
    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error