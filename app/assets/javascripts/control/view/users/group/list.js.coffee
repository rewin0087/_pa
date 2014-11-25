# Group View list
class App.Control.Views.Groups extends App.Views.Collection
    el: 'tbody'

    initialize: () ->
        @collection.on 'add', @addOne, @
        @collection.on 'change', @render, @

    render: () =>
        @$el.html ''
        @collection.each(@addOne, @)
        @
    
    addOne: (group) =>
        groupView = new App.Control.Views.Group({ model: group })
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.append(groupView.render().el)