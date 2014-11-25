# Printing Cart Summary Remove Modal Item list detail View
class App.Web.Views.Printing_Cart_Summary_Remove_Modal_Item extends App.Views.Base
    template: 'App-Views-Cart-Summary-Remove-Item-Modal'
    context: null
    
    events: () ->
        {     
            'click .remove-item-now' : 'removeItemNow'
        }

    removeItemNow: () =>
        _h.log @model

        model = new App.Web.Models.Cart_Item(@model.toJSON())
        model.urlRoot = '/resource/print/cart-summary'
        # add flag duplicate item
        model.set('remove_item', 1)
         # save
        model.save [],
            success: @success
            error: @error
        # return self
        @

    success: (model) =>
        _h.log model
        # initialize collection
        collection = new App.Web.Collections.Cart()
        _.map model.attributes, (object) =>
            if !!object.item
                collection.add(object)
        # hide modal
        $('#rmvModal').modal('hide')
        # intialize indexView
        @context.collection = collection
        # render index view
        @context.render().el
        # return self
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
        if !!error.reload
            location.reload()