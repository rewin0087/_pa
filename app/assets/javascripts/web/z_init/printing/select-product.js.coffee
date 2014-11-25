$(document).ready ()->

    if $('body').hasClass('select-product-page')
        # get collection
        collection = new App.Web.Collections.Printing_Select_Products()
        # fetch collection data
        collection.fetch().then () ->
            # get ListView
            listView = new App.Web.Views.Printing_Select_Product_Index({ collection: collection })
            # render
            listView.render()

            $('#select-product-slider').carousel({ interval: false })