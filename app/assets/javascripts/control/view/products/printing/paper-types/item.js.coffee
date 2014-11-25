# Product Printing Paper type list detail View
class App.Control.Views.Product_Printing_PaperType_Detail extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-ProductPrintingPaperTypeDetail'

    initialize: () =>
        @model.on 'change', @render, @
        @model.on 'destroy', @unRender, @

    events: () ->
        {        
            'click #edit' : 'edit'
            'click #delete' : 'delete'
        }

    edit: () =>
        _h.log 'edit'
        # initialize Edit Modal and pass the current model for the data
        editModal = new App.Control.Views.EditProductPrintingPaperTypeModal({ model: @model })
        # set printers collection
        editModal.printers = @printers
        # set cutOffTIme collection
        editModal.cutOffTime = @cutOffTime
        
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-EditProductPrintingPaperTypeModal-Target"]').html html

        # get File to Upload
        _h.getFileToUpload '.file-upload'
        # file upload get name and pass to input field
        _h.getFileNameToInputField '.input-file', _h
        # return self
        @

    delete: () =>
        _h.log 'delete'
        # initialize Delete Modal and pass the current model for the data
        deleteModal = new App.Control.Views.DeleteProductPrintingPaperTypeModal({ model: @model })
        # get the html and rendered data to the html
        html = deleteModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-DeleteProductPrintingPaperTypeModal-Target"]').html html
        
        # return self
        @
        
    unRender: () =>
        # remove from html this current record
        @remove()
        