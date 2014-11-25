$(document).ready ()->
    
    if $('body').hasClass('me-info-page') or $('body').hasClass('me-address-page') or $('body').hasClass('me-libraries-page') or $('body').hasClass('me-orders-page')
        # get model
        model = new App.Web.Models.Me_Avatar()
        # set url
        model.urlRoot = '/resource/me/infos'
        # show loader
        _h.loader true
        # fetch data
        model.fetch().then () ->
            _h.log model
            # initialize view
            indexView = new App.Web.Views.Me_Avatar({ model: model })
            # render view
            $('div[data-target="me-avatar"]').html indexView.render().el
            _h.loader false