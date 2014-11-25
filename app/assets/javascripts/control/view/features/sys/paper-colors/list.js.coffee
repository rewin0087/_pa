# Sys Paper Color list View
class App.Control.Views.Features_Sys_PaperColors extends App.Views.Collection
    el: '#sys-paper-color-holder'

    render: () =>
        @$el.find('tbody').html ''
        
        @collection.each(@addOne, @)
        # return self
        @

    addOne: (model) =>
        # initialize paperColorView view
        paperColorView = new App.Control.Views.Features_Sys_PaperColor( { model: model } )
        # empty dataTable content
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.find('tbody').append(paperColorView.render().el)
        # return self
        @