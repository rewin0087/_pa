# Home Register
class App.Web.Views.Register extends App.Views.Base
    template: 'App-Views-Register'

    events: () =>
        {        
            'click .register' : 'register'
        }
    
    render: () =>
        template = $('#'+ @template).html();
        compiled = _.template(template)
        @setElement(compiled())
        @

    register: ()=>
        _h.loader true
        model = new App.Web.Models.Register()
        model.urlRoot = '/resource/users/customers'
        model.set('register', 1)
        form = $('form.register')
        data = _h.serializeForm form
        _h.log data
        model.save data,
            success: @success
            error: @error

    success: () ->
        _h.loader false
        window.location.replace("/me/info");

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

