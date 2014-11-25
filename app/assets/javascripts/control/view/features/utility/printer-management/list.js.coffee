# Features Utility Printer-Management View list
class App.Control.Views.Features_Utility_PrinterManagements extends App.Views.Collection
    el: '#printer-management-table tbody'

    initialize: () ->
        @collection.on 'add', @addOne, @
        @collection.on 'change', @render, @

    render: () =>
        @$el.html ''
        @collection.each(@addOne, @)
        @
    
    addOne: (model) =>
        itemView = new App.Control.Views.Features_Utility_PrinterManagement({ model: model })
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.append(itemView.render().el)