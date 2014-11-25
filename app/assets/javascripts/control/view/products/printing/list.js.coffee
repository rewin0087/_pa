# Product Printing list View
class App.Control.Views.Product_Printing_List extends App.Views.Collection
    el: '#product-printing-holder'

    initialize: () ->
        @collection.on 'add', @addOne, @
        @collection.on 'change', @render, @
        
    render: () =>
        @$el.find('tbody').html ''
        
        @collection.each(@addOne, @)

        # return self
        @

    addOne: (model) =>
        # initialize detailView view
        detailView = new App.Control.Views.Product_Printing_Detail( { model: model } )
        # empty dataTable content
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.find('tbody').append(detailView.render().el)
        # return self
        @