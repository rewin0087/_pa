# Backend View Add Modal
class App.Web.Views.Printing_Setup_Option_GivenName extends App.Views.Base
    template: 'App-Views-Given-Name-Modal'
    context: null
    base_context: null
    cart_model: null

    events: () ->
        {        
            'click .update' : 'updateGivenName'
        }

    render: () =>
        template = $('#'+ @template).html();
        compiled = _.template(template)
        @setElement(compiled())
        @

    renderFromCartSummary: () =>
        @model = null
        # set to empty
        @$el.find('textarea[name="cart_item_name"]').html ''

        if !!@cart_model.get('item').item_given_name
            @$el.find('textarea[name="cart_item_name"]').html @cart_model.get('item').item_given_name.cart_item_name

        @

    updateGivenName: (e) =>
        e.preventDefault()
        # get form
        form = @$el.find('form')
        # serialize form
        data = _h.serializeForm form
        
        # get model
        @model = new App.Web.Models.Cart_Item()
        # set url
        if !!@context
            @model.set('item', @cart_model)
            @model.urlRoot = '/resource/print/cart-summary'
        else
            @model.urlRoot = '/resource/print/setup-options/setup-paper'

        # enable current selection storing for paper color
        @model.set('current_selection_given_name', 1)    
        
        # send request to save current selection for given name
        @model.save data,
            success: @success
            error: @error

        @

    success: (model) =>

        if !!@context
            # render name to view on cart summary
            @context.$el.find('.update-name').html @model.get('item').item_given_name.cart_item_name
            # set empty to textarea
            $('textarea[name="cart_item_name"]').html ''
            # set current position
            model.set('position', @cart_model.get('position'))
            # change model
            @context.model = model
            # get cart
            cart = new App.Web.Collections.Cart()
            # render cart
            cart.fetch().then () =>
                @base_context.collection = cart
                # render base context
                @base_context.render()
        else
            $('#update-given-name .givename').html @model.get('item_given_name').cart_item_name

        # show notification message
        _h.message 'success', 'Successfully updated given name.'
        # hide modal
        $('#item-given-name').modal('hide')
        # hide loader
        _h.loader false

        @

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
        # reload page if reload response received
        #if !!error.reload
         #   location.reload()