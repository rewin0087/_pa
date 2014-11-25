$(document).ready ()->
    
    if $('body').hasClass('config-cut-off-time-settings-page')
        # get model collection
        collection = new App.Control.Collections.Features_Config_CutOffTimeSettings();
        # show loader
        _h.loader true
        # fetch data
        collection.fetch( { add : true } ).then () ->
            _h.log collection
            # get view collection
            listView = new App.Control.Views.Features_Config_CutOffTimeSettings({ collection: collection })
            # render html
            listView.render().el
            # initialize add modal
            addModal = new App.Control.Views.AddConfigCutOffTimeSettingsModal({ collection: collection })
            # set masking for value
            _h.timeMasking '#value'
            # initialize datatables
            $('#cut-off-time-settings-table').dataTable
                'info': false

            # hide loader
            _h.loader false


 