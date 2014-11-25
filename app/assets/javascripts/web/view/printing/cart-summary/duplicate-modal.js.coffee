# Printing Cart Summary Duplicate Modal Item list detail View
class App.Web.Views.Printing_Cart_Summary_Duplicate_Modal_Item extends App.Views.Base
    template: 'App-Views-Cart-Summary-Duplicate-Item-Modal'
    context: null

    events: () ->
        {     
            'click .duplicate-item-now' : 'duplicateItemNow'
        }
        
    duplicateItemNow: () =>
         _h.log @model
         # remove position
         @model.unset('position')

         model = new App.Web.Models.Cart_Item(@model.toJSON())
         model.urlRoot = '/resource/print/cart-summary'
         # add flag duplicate item
         model.set('duplicate_item', 1)
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
        $('#duplicateModal').modal('hide')
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

