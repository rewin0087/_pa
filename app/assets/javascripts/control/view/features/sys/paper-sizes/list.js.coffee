# Sys Paper Size list View
class App.Control.Views.Features_Sys_PaperSizes extends App.Views.Collection
    el: '#sys-paper-size-holder'

    render: () =>
        @$el.find('tbody').html ''
        
        @collection.each(@addOne, @)
        # return self
        @

    addOne: (model) =>
        # initialize paperColorView view
        paperSizeView = new App.Control.Views.Features_Sys_PaperSize( { model: model } )
        # empty dataTable content
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.find('tbody').append(paperSizeView.render().el)
        # return self
        @