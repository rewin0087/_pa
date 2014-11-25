$(document).ready ()->
    
    if $('body').hasClass('product-printing-paper-type-page')
        # get print product identity
        printProductIdentity = $('#product-printing-identity')
        print_product_id = printProductIdentity.attr('data-print-product-id')
        # get model collection
        collection = new App.Control.Collections.Products_Printing_PaperTypes();
        collection.url = '/resource/products/printing/paper-types/?print_product_id=' + print_product_id
        # printers model collection
        printerCollection = new App.Control.Collections.Features_Utility_PrinterManagements()
        # cut off time settings model collection
        cutOffTimeCollection = new App.Control.Collections.Features_Config_CutOffTimeSettings()
        # show loader
        _h.loader true
        # fetch data
        collection.fetch( { add : true } ).then () ->
            # remove parameter from the url
            collection.url = '/resource/products/printing/paper-types'
            # fetch printers data
            printerCollection.fetch().then () =>
                # fetch cutOffTime data
                cutOffTimeCollection.fetch().then () =>
                    _h.log collection
                    # get view backend collection 
                    listView = new App.Control.Views.Product_Printing_PaperType_List({ collection: collection })
                    # set printers collection
                    listView.printers = printerCollection
                    # set cutOffTIme collection
                    listView.cutOffTime = cutOffTimeCollection
                    # render html
                    listView.render().el
                    # initialize add modal
                    addModal = new App.Control.Views.AddProductPrintingPaperTypeModal({ collection: collection })
                    # set printers collection
                    addModal.printers = printerCollection
                    # set cutOffTIme collection
                    addModal.cutOffTime = cutOffTimeCollection
                    # render cut off time and printer data to select
                    addModal.render()
                    # initialize datatables
                    $('#product-printing-paper-type-table').dataTable
                        'info': false
                        'iDisplayLength': 20
                    # hide loader 
                    _h.loader false
                    # get File to Upload
                    _h.getFileToUpload '.file-upload'
                    # file upload get name and pass to input field
                    _h.getFileNameToInputField '.input-file', _h
                    # initialize tooltip
                    _h.tooltip '._tooltip'
            