# Sys Paper Finishing Type list View
class App.Control.Views.Features_Sys_FinishingProductionsCategories extends App.Views.Collection
    el: '#sys-finishing-productions-category-holder'

    render: () =>
        @$el.find('tbody').html ''
        
        @collection.each(@addOne, @)
        # return self
        @

    addOne: (model) =>
        # initialize finishingProductionsCategoryView view
        finishingProductionsCategoryView = new App.Control.Views.Features_Sys_FinishingProductionsCategory( { model: model } )
        # empty dataTable content
        empty_row = @$el.find('.dataTables_empty')
        # remove if empty data row exist
        if empty_row != null
            empty_row.remove()
        # append new row data
        @$el.find('tbody').append(finishingProductionsCategoryView.render().el)
        # return self
        @