# Sys Paper Finishing Type list View
class App.Control.Views.Features_Sys_PaperFinishingTypes extends App.Views.Collection
    el: '#sys-paper-finishing-type-holder'

    render: () =>
        @$el.find('tbody').html ''
        
        @collection.each(@addOne, @)
        # return self
        @

    addOne: (model) =>
        # initialize paperFinishingTypeView view
        paperFinishingTypeView = new App.Control.Views.Features_Sys_PaperFinishingType( { model: model } )
        # empty dataTable content
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.find('tbody').append(paperFinishingTypeView.render().el)
        # return self
        @