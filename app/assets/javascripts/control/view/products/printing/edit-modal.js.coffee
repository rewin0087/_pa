# Product Printing View Edit Modal
class App.Control.Views.EditProductPrintingModal extends App.Views.Base
    template: 'App-Views-EditProductPrintingModal'

    events: () =>
        {        
            'click .update' : 'update'
        }

    render: =>
        template = _h.template(@template)
        # render sheet devisions
        model = @model
        setTimeout () ->
            sheetDivisions = model.get('sheet_division').split ','
            # get File to Upload
            _h.getFileToUpload '.edit-modal .file-upload'
            $.each(sheetDivisions, (i, v) ->
                $('.edit-modal .sheet_divisions[value="' + v + '"]').prop('checked', true)
            )
        , 300
        @$el.html template( @model.toJSON() )
        # return self
        @

    update: () =>
        # show loader
        _h.loader true
         # form data
        formData = new FormData()
        # get the form
        form = @$('form')
         # product image
        e_product_image = form.find('#e_product_image_file')
        # product hover image
        e_product_hover_image = form.find('#e_product_hover_image_file')
        # serialize form and get data
        data = _h.serializeForm form
        # append data
        $.each(data, (i, item) ->
            formData.append(i, item)
            _h.log item
        )
        # add product image
        if !!e_product_image
            $.each(e_product_image[0].files, (i, item) ->
                formData.append('e_product_image', item)
                _h.log item
            )
        # add product hover image
        if !!e_product_hover_image[0]
            $.each(e_product_hover_image[0].files, (i, item) ->
                formData.append('e_product_hover_image', item)
                _h.log item
            )

        $.ajax(
            type: 'post'
            data: formData
            url: "/resource/products/printing/" + @model.get('id')
            cache: false
            contentType: false
            processData: false
            success: @success
            error: @error
        )

    success: (res) =>
        # hide loader
        _h.loader false
        # update values of the model
        @model.set(res)
        # show notification message
        _h.message 'success', 'Successfully updated this Print Product.'
        # hide modal
        $('div.edit-modal').modal('toggle')
        # reset form
        @$('form')[0].reset()

    error: (response) =>
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        _h.log response
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error