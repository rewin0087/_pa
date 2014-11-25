$(document).ready ()->
  
    if $('body').hasClass('setup-finishing-page')
        
        # get collection
        collection = new App.Web.Collections.Printing_Setup_Finishings()
        # get cart
        cart = new App.Web.Models.Printing_Setup_Finishing()
        cart.urlRoot = '/resource/print/setup-options/setup-paper/cart'
        # show loader
        _h.loader true
        # fetch data
        collection.fetch().then () ->
            cart.fetch().then () ->
                # initialize view
                indexView = new App.Web.Views.Printing_Setup_Finishing_Index({ collection: collection })
                indexView.cart = cart
                # render view
                indexView.render()
                # hide loader
                _h.loader false