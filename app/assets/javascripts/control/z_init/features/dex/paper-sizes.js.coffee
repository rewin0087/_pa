$(document).ready ()->
    
    if $('body').hasClass('dex-paper-sizes-page')
       # get paper size model collections
        dexFeaturesPaperSizeCollection = new App.Control.Collections.Features_Dex_PaperSizes()
        # show loader
        _h.loader true
        # fetch data
        dexFeaturesPaperSizeCollection.fetch().then () ->
            _h.log dexFeaturesPaperSizeCollection
            # get list view
            paperSizeListView = new App.Control.Views.Features_Dex_PaperSizes({ collection: dexFeaturesPaperSizeCollection })
            #render html
            paperSizeListView.render().el
            # initialize datatables 
            $('#paper-size-holder table').dataTable
                'info': true
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'
