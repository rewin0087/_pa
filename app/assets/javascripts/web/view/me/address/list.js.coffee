# Me Address View list
class App.Web.Views.Me_Addresses extends App.Views.Collection
    el: '#addresses-table tbody'

    initialize: () ->
        @collection.on 'add', @addOne, @
        @collection.on 'change', @render, @
        _h.log "tab"

    tab: () ->
       _h.log "tab"

    render: () =>
        @$el.html ''
        @collection.each(@addOne, @)
        @
    
    addOne: (model) =>
        itemView = new App.Web.Views.Me_Address({ model: model })
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.append(itemView.render().el)