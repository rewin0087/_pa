$(document).ready ()->
    
    if $('body').hasClass('me-info-page')
        # get model
        model = new App.Web.Models.Me_Info()
        # set url
        model.urlRoot = '/resource/me/infos'
        # show loader
        _h.loader true
        # fetch data
        model.fetch().then () ->
            _h.log model
            # initialize view
            indexView = new App.Web.Views.Me_Infos({ model: model })
            # render view
            $('div[data-target="me-info-basic"]').html indexView.render().el
            
            _h.loader false