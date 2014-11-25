$(document).ready () ->
    
    if $('html').hasClass('web')
        # get cart
        cart_collection = new App.Web.Collections.Cart()
        # render cart
        cart_collection.fetch().then () ->
            cart_collection.updateCartNotification() 