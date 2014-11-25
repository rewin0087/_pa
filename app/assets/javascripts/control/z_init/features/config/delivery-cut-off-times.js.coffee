$(document).ready ()->
    
    if $('body').hasClass('config-delivery-cut-off-time-page')
        # get model collection
        collection = new App.Control.Collections.Features_Config_DeliveryCutoffTimes();
        # show loader
        _h.loader true
        # fetch data
        collection.fetch( { add : true } ).then () ->
            _h.log collection
            # get view collection
            listView = new App.Control.Views.Features_Config_DeliveryCutoffTimes({ collection: collection })
            # render html
            listView.render().el
            # initialize add modal
            addModal = new App.Control.Views.AddConfigDeliveryCutoffTimeModal({ collection: collection })
            # set masking for value
            _h.timeRangeMasking '#value'
            # initialize datatables
            $('#delivery-cut-off-time-table').dataTable
                'info': false

            # hide loader
            _h.loader false


 