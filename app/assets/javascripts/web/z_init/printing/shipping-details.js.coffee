$(document).ready () ->
  
    if $('body').hasClass('shipping-details-page')
        #loader
        _h.loader true
        # get collection
        collection = new App.Web.Collections.Cart()
        # fetch collection data
        collection.fetch().then () ->
            # get ListView
            listView = new App.Web.Views.Printing_Shipping_Details_Index({ collection: collection })
            # listView.user_addresses = userAddresses
            # render
            listView.render()

            # initialize bootstrap tooltip
            $('body').tooltip 
                selector: '[data-toggle="tooltip"]'
            
            _h.loader false
