# EditSysFinishingProductionsModal Modal
class App.Control.Views.EditSysFinishingProductionsModal extends App.Views.Base
    template: 'App-Views-SysEditFinishingProductionsModal'
    
    events: () =>
        {        
            'click .update' : 'update'
        }

    update: () =>
        _h.loader true
         # form data
        formData = new FormData()
        # get the form
        form = @$('form')
        # finishing productions image
        fp_image = form.find('#fp_image_file')
        # serialize the form to get the data
        data = _h.serializeForm(form)
        # append data
        $.each(data, (i, item) ->
            formData.append(i, item)
            _h.log item
        )
        # add product image
        if !!fp_image
            $.each(fp_image[0].files, (i, item) ->
                formData.append('fp_image', item)
                _h.log item
            )

        $.ajax(
            type: 'post'
            data: formData
            url: "/resource/features/sys/finishing-productions/" + @model.get('id')
            cache: false
            contentType: false
            processData: false
            success: @success
            error: @error
        )
        # save now the data
        # @model.save data,
        #     success: @success
        #     error: @error

    success: (res) =>
        _h.log res
        # hide loader
        _h.loader false
        # update values of the model
        @model.set(res)
        # show notification message
        _h.message 'success', 'Successfully updated record.'
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