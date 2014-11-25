# Sys Bad Data Error list View
class App.Control.Views.Features_Sys_BadDataErrors extends App.Views.Collection
    el: '#sys-bad-data-error-holder'

    render: () =>
        @$el.find('tbody').html ''
        
        @collection.each(@addOne, @)
        # return self
        @

    addOne: (model) =>
        # initialize badDataErrorView view
        badDataErrorView = new App.Control.Views.Features_Sys_BadDataError( { model: model } )
        # empty dataTable content
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.find('tbody').append(badDataErrorView.render().el)
        # return self
        @