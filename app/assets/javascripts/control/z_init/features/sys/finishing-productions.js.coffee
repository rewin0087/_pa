$(document).ready ()->
    
    if $('body').hasClass('sys-finishing-productions-page') or $('body').hasClass('sys-finishing-productions-category-options-page')
       # get paper Size model collections
        # sysFeaturesFinishingProductionsCollection = new App.Control.Collections.Features_Sys_FinishingProductions()
        # finishingProductionsCategoryModel = new App.Control.Models.Features_FinishingProductionsCategory({ id: 1 })
        # debugger
        # show loader
        # get print product identity
        finishingProductionsIdentity = $('#finishing-productions-identity')
        category_name = finishingProductionsIdentity.attr('data-category-name')
        # get model collection
        sysFeaturesFinishingProductionsCollection = new new App.Control.Collections.Features_Sys_FinishingProductions()
        sysFeaturesFinishingProductionsCollection.url = '/resource/features/sys/finishing-productions?category_name=' + category_name
        _h.loader true
        # fetch data
        sysFeaturesFinishingProductionsCollection.fetch().then () ->
            sysFeaturesFinishingProductionsCollection.url = '/resource/features/sys/finishing-productions'
            # sysFeaturesFinishingProductionsCollection.finishingProductionsCategoryModel = finishingProductionsCategoryModel
            _h.log sysFeaturesFinishingProductionsCollection
            # get list view
            sysFinishingProductionsListView = new App.Control.Views.Features_Sys_FinishingProductions({ collection: sysFeaturesFinishingProductionsCollection })
            # render html
            sysFinishingProductionsListView.render().el
            # initialize datatables 
            $('#sys-finishing-productions-holder table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'
            # get File to Upload
