# Sys Bad Data Error list View
class App.Control.Views.Features_Sys_BadDataErrorOptions extends App.Views.Collection
    el: '#sys-bad-data-error-option-holder'

    render: () =>
        @$el.find('tbody').html ''
        
        @collection.each(@addOne, @)
        # return self
        @

    addOne: (model) =>
        # initialize badDataErrorOptionView view
        badDataErrorOptionView = new App.Control.Views.Features_Sys_BadDataErrorOption( { model: model } )
        # empty dataTable content
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.find('tbody').append(badDataErrorOptionView.render().el)
        # return self
        @