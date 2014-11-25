# Features Config ConfigurationModal View Edit Modal
class App.Control.Views.Login extends App.Views.Base
    template: 'login-form'

    events: () =>
        {        
            'click .login' : 'login'
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
        _h.message 'success', 'Successfully updated this record.'


