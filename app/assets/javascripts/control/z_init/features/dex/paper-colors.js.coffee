$(document).ready ()->
    
    if $('body').hasClass('dex-paper-colors-page')
       # get paper color model collections
        dexFeaturesPaperColorCollection = new App.Control.Collections.Features_Dex_PaperColors()
        # show loader
        _h.loader true
        # fetch data
        dexFeaturesPaperColorCollection.fetch().then () ->
            _h.log dexFeaturesPaperColorCollection
            # get list view
            paperColorListView = new App.Control.Views.Features_Dex_PaperColors({ collection: dexFeaturesPaperColorCollection })
            # render html
            paperColorListView.render().el
            # initialize datatables 
            $('#paper-color-holder table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'