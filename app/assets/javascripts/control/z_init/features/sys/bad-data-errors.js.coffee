$(document).ready ()->
    
    if $('body').hasClass('sys-bad-data-errors-page')
       # get bad data error model collections
        sysFeaturesBadDataErrorCollection = new App.Control.Collections.Features_Sys_BadDataErrors()
        # show loader
        _h.loader true

        # fetch data
        sysFeaturesBadDataErrorCollection.fetch().then () ->
            _h.log sysFeaturesBadDataErrorCollection
            # get list view
            sysFeaturesBadDataErrorListView = new App.Control.Views.Features_Sys_BadDataErrors({ collection: sysFeaturesBadDataErrorCollection })
            #render html
            sysFeaturesBadDataErrorListView.render().el
            # initialize datatables 
            $('#sys-bad-data-error-holder table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'