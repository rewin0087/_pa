# Home Login
class App.Web.Views.Login extends App.Views.Base
    template: 'App-Views-Login'

    events: () =>
        {        
            'click .login' : 'login'
        }
  
    render: () =>
        template = $('#'+ @template).html();
        compiled = _.template(template)
        @setElement(compiled())
        @

    login: ()=>
        _h.loader true
        model = new App.Web.Models.Login()
        model.urlRoot = '/resource/users/customers'
        model.set('login', 1)
        form = $('form.login')
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
