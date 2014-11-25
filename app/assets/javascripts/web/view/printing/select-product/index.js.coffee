# Printing Select Product list View
class App.Web.Views.Printing_Select_Product_Index extends App.Views.Collection
    el: '#product-list'
    counter: 0
    page: 0

    render: () =>
        @$el.find('#product-holder').html ''
        # set item pre tag
        @$el.find('#product-holder').append('<ul class="item clearfix active item-' + @page + '">')        
        # add item
        @collection.each(@addOne, @)
        # end item
        @$el.find('#product-holder').append('</ul>')

        # return self
        @

    addOne: (model) =>
        @counter++
        # initialize detailView view
        detailView = new App.Web.Views.Product_Printing_Detail( { model: model } )
        # append new row data
        @$el.find('#product-holder .item-' + @page).append(detailView.render().el)
        # separate item by 6
        if @counter % 6 == 0
            @page++
            @$el.find('#product-holder').append('</ul><ul class="item clearfix item-' + @page + '">')
        # return self
        @

