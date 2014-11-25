$(document).ready ()->
    
    if $('body').hasClass('products-printing-page')
        # get model collection
        collection = new App.Control.Collections.Products_Printing();
        # show loader
        _h.loader true
        # fetch data
        collection.fetch( { add : true } ).then () ->
            _h.log collection
            # get view collection 
            listView = new App.Control.Views.Product_Printing_List({ collection: collection })
            # render html
            listView.render()
            # initialize add modal
            addModal = new App.Control.Views.AddProductPrintingModal({ collection: collection })
            # initialize datatables
            $('#product-printing-table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'
            # get File to Upload
            _h.getFileToUpload '.file-upload'


 