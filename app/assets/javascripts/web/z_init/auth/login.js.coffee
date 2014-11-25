$(document).ready ()->
    
    if $('body')
        # initialize view
        loginView = new App.Web.Views.Login()
        # render view
        if $('div[data-target="home-login"]').length>=1
            $('div[data-target="home-login"]').html loginView.render().el
            _h.log "render login"