# Features Utility Printer-Management View list detail
class App.Control.Views.Features_Utility_PrinterManagement extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-UtilityPrinterManagementDetail'

    initialize: () =>
        @model.on 'change', @render, @
        @model.on 'destroy', @unRender, @

    events: () ->
        {        
            'click #edit' : 'edit'
            'click #delete' : 'delete'
        }

    edit: () =>
        # initialize Edit Modal and pass the current model for the data
        editModal = new App.Control.Views.EditUtilityPrinterManagementModal({ model : @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-EditUtilityPrinter-ManagementModal-Target"]').html html
        
     delete: () =>
        # initialize Edit Modal and pass the current model for the data
        deleteModal = new App.Control.Views.DeleteUtilityPrinterManagementModal({ model : @model })
        # get the html and rendered data to the html
        html = deleteModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-DeleteUtilityPrinter-ManagementModal-Target"]').html html

    unRender: () =>
        # remove from html this current record
        @remove()
