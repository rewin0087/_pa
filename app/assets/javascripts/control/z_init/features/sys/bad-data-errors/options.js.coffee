$(document).ready ()->
    
    if $('body').hasClass('sys-bad-data-error-options-page')
        # get bad data error identity
        badDataErrorIdentity = $('#bad-data-error-identity')
        bad_data_error_id = badDataErrorIdentity.attr('data-bad-data-error-id')
        # get bad data error option model collections
        sysFeaturesBadDataErrorOptionCollection = new App.Control.Collections.Features_Sys_BadDataErrorOptions()
        sysFeaturesBadDataErrorOptionCollection.url = '/resource/features/sys/bad-data-errors/options/?bad_data_error=' + bad_data_error_id
        # show loader
        _h.loader true

        # fetch data
        sysFeaturesBadDataErrorOptionCollection.fetch().then () ->
            _h.log sysFeaturesBadDataErrorOptionCollection
            # remove parameter from the url
            sysFeaturesBadDataErrorOptionCollection.url = '/resource/features/sys/bad-data-errors/options'
            # get list view
            sysFeaturesBadDataErrorOptionListView = new App.Control.Views.Features_Sys_BadDataErrorOptions({ collection: sysFeaturesBadDataErrorOptionCollection })
            #render html
            sysFeaturesBadDataErrorOptionListView.render().el
            # initialize datatables 
            $('#sys-bad-data-error-option-holder table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'