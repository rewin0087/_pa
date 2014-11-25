$(document).ready ()->
    
    if $('body').hasClass('sys-paper-colors-page')
       # get paper color model collections
        dexFeaturesPaperColorCollection = new App.Control.Collections.Features_Sys_PaperColors()
        # show loader
        _h.loader true
        # fetch data
        dexFeaturesPaperColorCollection.fetch().then () ->
            _h.log dexFeaturesPaperColorCollection
            # get list view
            paperColorListView = new App.Control.Views.Features_Sys_PaperColors({ collection: dexFeaturesPaperColorCollection })
            #render html
            paperColorListView.render().el
            # initialize datatables 
            $('#sys-paper-color-holder table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'