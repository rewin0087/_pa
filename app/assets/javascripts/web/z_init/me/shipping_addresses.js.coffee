$(document).ready ()->
    
    if $('body').hasClass('me-address-page')
        # get model collection
        collection = new App.Web.Collections.Me_ShippingAddresses();
        # show loader
        _h.loader true
        # fetch data
        collection.fetch( { add : true } ).then () ->
            _h.log collection
            # get view collection
            listView = new App.Web.Views.Me_ShippingAddresses({ collection: collection })
            # render html
            listView.render().el
            # initialize add modal
            addModal = new App.Web.Views.AddShippingAddressModal({ collection: collection })
            # initialize datatables
            $('#shipping-addresses-table').dataTable
                'info': false
            # hide loader
            _h.loader false