$(document).ready ()->
  
    if $('body').hasClass('upload-data-page')
        # get cart
        cart = new App.Web.Models.Printing_Setup_Finishing()
        cart.urlRoot = '/resource/print/setup-options/setup-paper/cart'
        # show loader
        _h.loader true
        # fetch data
        cart.fetch().then () ->
            # initialize view
            indexView = new App.Web.Views.Printing_Upload_Data_Index()
            indexView.cart = cart
            # render view
            indexView.render()
            # hide loader
            _h.loader false

            _h.getFileToUpload '.file_upload'