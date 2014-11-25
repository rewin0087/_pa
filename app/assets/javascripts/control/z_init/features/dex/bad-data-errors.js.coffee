$(document).ready ()->
    
    if $('body').hasClass('dex-bad-data-errors-page')
       # get paper BadDataError model collections
        dexFeaturesBadDataErrorCollection = new App.Control.Collections.Features_Dex_BadDataErrors()
        # show loader
        _h.loader true
        # fetch data
        dexFeaturesBadDataErrorCollection.fetch().then () ->
            _h.log dexFeaturesBadDataErrorCollection
            # get list view
            badDateErrorListView = new App.Control.Views.Features_Dex_BadDataErrors_Main({ collection: dexFeaturesBadDataErrorCollection})
            # render html
            badDateErrorListView.render().el
            # initialize datatables
            $('#bad-data-error-holder table').dataTable
                'info' : false
                'scrollY' : 500
                'paging' : false
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'