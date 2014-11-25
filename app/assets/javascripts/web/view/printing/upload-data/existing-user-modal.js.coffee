# Printing Upload Data Existing User Modal View
class App.Web.Views.Printing_Upload_Data_Existing_User_Modal extends App.Views.Base
    el: '.existing-user'

    events: () ->
        {
            'click .login' : 'login'
        }

    render: () =>

        @$el.find('form')[0].reset()
        @

    login: () =>
        form = @$el.find('form')
        data = _h.serializeForm form
        model = new App.Web.Models.Register(data)
        model.urlRoot = '/resource/users/customers'
        model.set('login', 1)

        model.save [],
            success: @success
            error: @error
        @

    success: () =>
        # show message
        _h.message 'success', 'Successfully Logged in, Reloading Page...'
        setTimeout () ->
            location.reload()
        , 1000
        @

    error: (model, response) =>
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent else responseContent.error
        # show error
        if !!error.message
            _h.message 'error', error.message
        else
            _h.message 'error', 'Sorry something went wrong while processing your request. Please try again later'
