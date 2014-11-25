$(document).ready ()->
    
    if $('body').hasClass('utility-printer-management-page')
        # get model collection
        collection = new App.Control.Collections.Features_Utility_PrinterManagements();
        # show loader
        _h.loader true
        # fetch data
        collection.fetch( { add : true } ).then () ->
            _h.log collection
            # get view collection
            listView = new App.Control.Views.Features_Utility_PrinterManagements({ collection: collection })
            # render html
            listView.render().el
            # initialize add modal
            addModal = new App.Control.Views.AddUtilityPrinterManagementModal({ collection: collection })
            # initialize datatables
            $('#printer-management-table').dataTable
                'info': false

            # hide loader
            _h.loader false


 