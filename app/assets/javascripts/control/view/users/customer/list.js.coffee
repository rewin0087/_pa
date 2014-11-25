# Customer View list
class App.Control.Views.Users_Customers extends App.Views.Collection
    template: 'App-Views-CustomersList'
    el: 'tbody'

    initialize: () ->
        @collection.on 'add', @addOne, @
        @collection.on 'change', @render, @

    render: () =>
        @$el.html ''
        @collection.each(@addOne, @)
        @
    
    addOne: (customer) =>
        customerView = new App.Control.Views.Users_Customer({ model: customer })
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.append(customerView.render().el)