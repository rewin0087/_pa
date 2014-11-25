# Printing Cart Summary Index View
class App.Web.Views.Printing_Cart_Summary_Index extends App.Views.Collection
    el: '#select-options'
    cartHolder: null
    counter: 0
    grand_total: 0
    shippingDetailUrl: '/printing/shipping-details'

    events: () ->
        {
            'click #go-to-shipping-details' : 'goToShippingDetails'
            'click #empty-cart' : 'emptyCart'
        }

    emptyCart: (e) =>
        e.preventDefault()

        model = new App.Web.Models.Cart_Item();
        model.urlRoot = '/resource/print/cart-summary'

        model.set('empty_cart', 1)

        model.save [],
            success: @clearCollection
            error: @error
        @

    clearCollection: () =>
        @collection.reset()
        @render()
        @updateCartNotification()
        @

    error: (model, response) ->
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent else responseContent.error
        # show error
        if !!error.message
            _h.message 'error', error.message
        else
            _h.message 'error', 'Sorry something went wrong while processing your request. Please try again later'

    render: () =>
        # reset values
        @counter = 0
        @grand_total = 0
        # find cart holder
        @cartHolder = @$el.find('div[data-template-target="cart-holder"]')
        # clear cart holder
        @cartHolder.html ''
        # add cart Item
        @collection.each @addOneCartItem, @
        # update cart notification
        @updateCartNotification()

        # render price
        @$el.find('#grand_total').html 'AED ' + _h.currency_format(@grand_total)
        # return self
        @

    goToShippingDetails: (e) =>
        e.preventDefault()

        model = new App.Web.Models.Cart_Item();
        model.urlRoot = '/resource/print/cart-summary'

        model.set('check_user_logged_in', 1)

        model.save [],
            success: @redirectToShippingDetails
            error: @triggerLogin
        @

    redirectToShippingDetails: () =>
        window.location.href = @shippingDetailUrl
        @

    triggerLogin: (model, response) =>
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent else responseContent.error
        # show error
        _h.message 'error', error.message
        # trigger login
        if !!error.show_login
            $('#login-trigger').click()
            $('input[name="email"]').focus()
        @

    updateCartNotification: () =>

        # get cart notification DOM
        cart_notification = $('#cartnotification')

        # get total size collection
        total_cart = @collection.length

        if !!total_cart && total_cart > 0
            cart_notification.show()
            
        # render cart total count
        $('.content', cartnotification).html total_cart

        # return self
        @

    addOneCartItem: (model) =>
        # set position
        model.set('position', @counter)
        # increment counter for position
        @counter++
        # initialize cart item view
        cartItemView = new App.Web.Views.Product_Printing_Cart_Item({ model: model })
        # add context
        cartItemView.context = @

        # append cart item
        @cartHolder.append(cartItemView.render().el)
        # compute price
        @grand_total += cartItemView.model.get('total_price')
       
        # return self
        @