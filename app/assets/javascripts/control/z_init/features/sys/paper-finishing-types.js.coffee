$(document).ready ()->
    
    if $('body').hasClass('sys-paper-finishing-types-page')
       # get paper Size model collections
        sysFeaturesPaperFinishingTypesCollection = new App.Control.Collections.Features_Sys_PaperFinishingTypes()
        # show loader
        _h.loader true
        # fetch data
        sysFeaturesPaperFinishingTypesCollection.fetch().then () ->
            _h.log sysFeaturesPaperFinishingTypesCollection
            # get list view
            sysPaperFinishingTypesListView = new App.Control.Views.Features_Sys_PaperFinishingTypes({ collection: sysFeaturesPaperFinishingTypesCollection })
            # render html
            sysPaperFinishingTypesListView.render().el
            # initialize datatables 
            $('#sys-paper-finishing-type-holder table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'