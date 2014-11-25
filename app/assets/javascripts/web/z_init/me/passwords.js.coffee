$(document).ready ()->
    
    if $('body').hasClass('me-info-page')
        # get model
        model = new App.Web.Models.Me_Password()
        # set url
        model.urlRoot = '/resource/me/current_user_password'
        # show loader
        _h.loader true
        # fetch data
        model.fetch().then () ->
            _h.log model
            # initialize view
            indexView = new App.Web.Views.Me_Passwords({ model: model })
            # render view
            $('div[data-target="me-info-password"]').html indexView.render().el
            
            _h.loader false