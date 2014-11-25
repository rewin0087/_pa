$(document).ready ()->
    
    if $('body')
        # initialize view
        registerView = new App.Web.Views.Register()
        # render view
        if $('div[data-target="home-register"]').length>=1
            $('div[data-target="home-register"]').html registerView.render().el
            _h.log "render register"