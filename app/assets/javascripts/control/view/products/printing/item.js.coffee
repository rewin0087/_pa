# Product Printing list detail View
class App.Control.Views.Product_Printing_Detail extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-ProductPrintingDetail'

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
        editModal = new App.Control.Views.EditProductPrintingModal({ model: @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-EditProductPrintingModal-Target"]').html html
        
        # return self
        @

    delete: () =>
        _h.log 'delete'
        # initialize Delete Modal and pass the current model for the data
        deleteModal = new App.Control.Views.DeleteProductPrintingModal({ model: @model })
        # get the html and rendered data to the html
        html = deleteModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-DeleteProductPrintingModal-Target"]').html html
        
        # return self
        @
        
    unRender: () =>
        # remove from html this current record
        @remove()
        