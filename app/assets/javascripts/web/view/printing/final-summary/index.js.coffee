# Printing Cart Summary Index View
class App.Web.Views.Printing_Final_Summary_Index extends App.Views.Collection
    el: '#select-options'
    cart: null
    shipping: null
    grand_total: 0

    events: () ->
        {
            'click #go-to-payment' : 'goToPayment'
        }

    render: () =>
        # get cart
        @cart = new App.Web.Collections.Cart()
        @cart.reset(@collection.models[0].get('cart'))
        @cart.url = '/resource/print/final-summary'
        # get shipping
        @shipping = @collection.models[0].get('shipping_details')
        # clear content
        @$el.find('#cart-holder').html ''
        # map each cart item
        if !!@cart
            # reset values
            @counter = 0
            @grand_total = 0
            @cart.each @addOneCart, @

        # render Shipping
        if !!@shipping
            # initialize shipping model
            @shipping = new App.Web.Models.ShippingDetails(@shipping)
            # initialize cart settings view
            cartSettings = new App.Web.Views.Product_Printing_Final_Cart_Settings({ model: @shipping })
            # render
            @$el.find('#cart-setting-holder').html cartSettings.render().el

        # render price
        @$el.find('#grand_total').html 'AED ' + _h.currency_format(@grand_total)
        @

    addOneCart: (model) =>
        # set position
        model.set('position', @counter)
        model.computePriceAndEstimatedDate()
        # increment counter for position
        @counter++

        itemView = new App.Web.Views.Product_Printing_Final_Cart_Item({ model: model })
        @$el.find('#cart-holder').append itemView.render().el

        # compute price
        @grand_total += itemView.model.get('total_price')
        @

    goToPayment: (e) =>
        e.preventDefault()
        check_collection = @collection

        check_collection.fetch().then () =>
            
            if check_collection.length < 1
                _h.message 'error', 'Cart is Empty. Please add Item to Cart, Redirecting...'
                setTimeout () ->
                    window.location = '/printing/select-product'
                , 1000
            else
                final_cart = new App.Web.Models.Final_Cart()
                final_cart.set('cart', @cart)
                final_cart.set('shipping_details', @shipping)
                final_cart.urlRoot = '/resource/print/final-summary'
                final_cart.save [],
                    success: @redirectToPayment
                    error: @error

    redirectToPayment: (res) =>
        _h.message 'success', 'Redirecting to Payment...'
        setTimeout () ->
            window.location = '/resource/print/payment'
        , 1000

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent else responseContent.error
        # show error
        if !!error.message
            _h.message 'error', error.message
        else
            _h.message 'error', 'Sorry something went wrong while processing your request. Please try again later'
        
