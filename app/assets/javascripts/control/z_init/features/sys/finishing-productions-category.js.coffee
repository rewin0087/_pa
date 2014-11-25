$(document).ready ()->
    
    if $('body').hasClass('sys-finishing-productions-category-page')
       # get paper Size model collections
        sysFeaturesFinishingProductionsCategoryCollection = new App.Control.Collections.Features_Sys_FinishingProductionsCategories()
        # show loader
        _h.loader true
        # fetch data
        sysFeaturesFinishingProductionsCategoryCollection.fetch().then () ->
            _h.log sysFeaturesFinishingProductionsCategoryCollection
            # get list view
            sysFinishingProductionsCategoryListView = new App.Control.Views.Features_Sys_FinishingProductionsCategories({ collection: sysFeaturesFinishingProductionsCategoryCollection })
            # render html
            sysFinishingProductionsCategoryListView.render().el
            # initialize datatables 
            $('#sys-finishing-productions-category-holder table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'