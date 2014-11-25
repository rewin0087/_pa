# Backends View list
class App.Control.Views.Users_Backends extends App.Views.Collection
    template: 'App-Views-BackendList'
    el: 'tbody'

    initialize: () ->
        @collection.on 'add', @addOne, @
        @collection.on 'change', @render, @

    render: () =>
        @$el.html ''
        @collection.each(@addOne, @)
        @
    
    addOne: (backend) =>
        backendView = new App.Control.Views.Users_Backend({ model: backend })
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.append(backendView.render().el)