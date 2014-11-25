$(document).ready ()->
    
    if $('body').hasClass('sys-paper-sizes-page')
       # get paper Size model collections
        sysFeaturesPaperSizeCollection = new App.Control.Collections.Features_Sys_PaperSizes()
        # show loader
        _h.loader true
        # fetch data
        sysFeaturesPaperSizeCollection.fetch().then () ->
            _h.log sysFeaturesPaperSizeCollection
            # get list view
            paperSizeListView = new App.Control.Views.Features_Sys_PaperSizes({ collection: sysFeaturesPaperSizeCollection })
            #render html
            paperSizeListView.render().el
            # initialize datatables 
            $('#sys-paper-size-holder table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'