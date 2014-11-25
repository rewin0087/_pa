# Product Printing View Add Modal
class App.Control.Views.AddProductPrintingModal extends App.Views.Base
    el: '#App-Views-AddProductPrintingModal'

    events: () =>
        {        
            'click .save' : 'save'
        }

    save: () =>
        # show loader
        _h.loader true
        # form data
        formData = new FormData()
        # get data
        form = @$el.find('form')
        # product image
        product_image = form.find('#product_image_file')
        # product hover image
        product_hover_image = form.find('#product_hover_image_file')
        # serialize form and get data
        data = _h.serializeForm form
        # append data
        $.each(data, (i, item) ->
            formData.append(i, item)
            _h.log item
        )
        # add product image
        if !!product_image
            $.each(product_image[0].files, (i, item) ->
                formData.append('product_image', item)
                _h.log item
            )
        # add product hover image
        if !!product_hover_image[0]
            $.each(product_hover_image[0].files, (i, item) ->
                formData.append('product_hover_image', item)
                _h.log item
            )

        $.ajax(
            type: 'post'
            data: formData
            url: "/resource/products/printing"
            cache: false
            contentType: false
            processData: false
            success: @success
            error: @error
        )

        # add new product printing now
        # @collection.create(
        #     # data
        #     data, 
        #     # response settings
        #     { wait: true, success: @success, error: @error }
        #)

    success: (res) =>
        model = new App.Control.Models.Products_Printing(res)
        # add to collection
        @collection.add(model)
        _h.log model
        _h.log @collection
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully created new Print Product.'
        # hide modal
        $('#App-Views-AddProductPrintingModal').modal('toggle')
        # reset fields
        @$el.find('form')[0].reset()
        @$el.find('form .icheckbox_minimal').removeClass('checked')
        
    error: (response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

