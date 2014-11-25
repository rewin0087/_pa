$(document).ready ()->
    
    if $('body').hasClass('me-info-page')
        # get model
        model = new App.Web.Models.Me_Email()
        # set url
        model.urlRoot = '/resource/me/current_user_email'
        # show loader
        _h.loader true
        # fetch data
        model.fetch().then () ->
            _h.log model
            # initialize view
            indexView = new App.Web.Views.Me_Emails({ model: model })
            # render view
            $('div[data-target="me-info-email"]').html indexView.render().el
            
            _h.loader false