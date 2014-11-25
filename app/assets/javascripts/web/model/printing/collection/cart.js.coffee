# Colors Collection
class App.Web.Collections.Cart extends App.Collections.Base
    model: App.Web.Models.Cart_Item
    url: '/resource/print/cart-summary'
    
    updateCartNotification: () =>

        # get cart notification DOM
        cart_notification = $('#cartnotification')

        # get total size collection
        total_cart = @length

        if !!total_cart && total_cart > 0
            cart_notification.show()
            
        # render cart total count
        $('.content', cart_notification).html total_cart
 
        # return self
        @