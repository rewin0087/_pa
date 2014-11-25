$(document).ready ()->
  
    if $('body').hasClass('setup-options-page')

        # get model
        model = new App.Web.Models.Printing_Setup_Options()
        # set url
        model.urlRoot = '/resource/print/setup-options/setup-paper'
        # show loader
        _h.loader true
        # fetch data
        model.fetch().then () ->
            # initialize view
            indexView = new App.Web.Views.Printing_Setup_Option_Index({ model: model })
            # render view
            indexView.render()
            # initialize bootstrap tooltip
            $('body').tooltip
                selector: '[data-toggle="tooltip"]'
            # hide loader
            _h.loader false
            # show selections
            $('#setup-paper-holder').fadeIn()