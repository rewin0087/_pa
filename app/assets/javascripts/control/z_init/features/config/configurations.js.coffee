$(document).ready ()->
    
    if $('body').hasClass('config-configurations-page')
        # get model collection
        collection = new App.Control.Collections.Features_Config_Configurations();
        # show loader
        _h.loader true
        # fetch data
        collection.fetch( { add : true } ).then () ->
            _h.log collection
            # get view collection
            listView = new App.Control.Views.Features_Config_Configurations({ collection: collection })
            # render html
            listView.render().el
            # initialize add modal
            addModal = new App.Control.Views.AddConfigConfigurationModal({ collection: collection })
            # initialize datatables
            $('#configurations-table').dataTable
                'info': false

            # hide loader
            _h.loader false


 