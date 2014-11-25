$(document).ready ()->

    if $('body').hasClass('cart-summary-page')
        # get collection
        collection = new App.Web.Collections.Cart()
        # fetch collection data
        collection.fetch().then () ->
            # get ListView
            listView = new App.Web.Views.Printing_Cart_Summary_Index({ collection: collection })
            # render
            listView.render().el