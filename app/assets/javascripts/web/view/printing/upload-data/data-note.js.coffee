# Printing Upload Data Note Modal View
class App.Web.Views.Printing_Upload_Data_Note_Modal extends App.Views.Base
    template: 'App-Views-Item-Add-Note-Modal'
    context: null
    from_cart_summary: 0

    events: () ->
        {
            'click .update-note' : 'updateNote'
        }

    render: () =>
        template = _h.template(@template)
        @$el.html template()
        _h.log 'render'
        if !!@model.get('data_note')
            @$el.find('textarea[name="cart_add_note"]').html @model.get('data_note').cart_add_note
        @

    renderFromCartSummary: () =>
        template = _h.template(@template)
        @$el.html template()
        _h.log 'render'
        if !!@model.get('item').data_note
            @$el.find('textarea[name="cart_add_note"]').html @model.get('item').data_note.cart_add_note
        @

    updateNote: () =>
        form = @$el.find('form')
        data = _h.serializeForm form

        model = new App.Web.Models.Cart_Item()

        if !!@from_cart_summary
            model.urlRoot = '/resource/print/cart-summary'
            model.set('position', @model.get('position'))
        else
            model.urlRoot = '/resource/print/setup-options/setup-paper'

        model.set('update_data_note', 1)
        model.save data,
            success: @success
            error: @error
        @

    success: (res) =>
        _h.log res
        if !!@from_cart_summary
            @context.$el.find('.update_note span').html
            @context.model = res
            @context.renderPriceAndEstimatedDate()
            @context.render()
        else
            @context.cart = res
        # show message
        _h.message 'success', 'Successfully Updated Data Note'
        $('#item-data-note').modal('toggle')
        @

    error: (model, response) =>
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
        @