# Printing Upload Data New User Modal View
class App.Web.Views.Printing_Upload_Data_New_User_Modal extends App.Views.Base
    el: '.new-user'

    events: () ->
        {
            'click .register' : 'register'
        }

    render: () =>
        _h.log 'new view'

        @$el.find('form')[0].reset()
        @

    register: () =>
        form = @$el.find('form')
        data = _h.serializeForm form
        model = new App.Web.Models.Register(data)
        model.urlRoot = '/resource/users/customers'
        model.set('register', 1)

        model.save [],
            success: @success
            error: @error
        @

    success: () =>
        # show message
        _h.message 'success', 'Successfully Registered, Reloading Page...'
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
        @


