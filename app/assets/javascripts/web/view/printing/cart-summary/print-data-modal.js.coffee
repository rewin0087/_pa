# Printing Cart Summary Print Data Modal Item list detail View
class App.Web.Views.Printing_Cart_Summary_Print_Data_Modal_Item extends App.Views.Base
    template: 'App-Views-Cart-Summary-Print-Data-Item-Modal'
    context: null
    cart_model: null
    base_context: null

    progressbar: (evt) =>
        _h.log evt
        progressbar = $('.progress-bar')
        if !!evt.lengthComputable
            progress = parseInt( (evt.loaded / evt.total * 100), 10)
            console.log("Loaded " + progress + "%");
            progressbar.attr('aria-valuenow', progress)
            progressbar.css({ width: progress + '%' })
            $('#progress_status').html  progress + '%'
        @

    resetProgressbar: () =>
        progressbar = $('.progress-bar')
        progressbar.attr('aria-valuenow', 0)
        progressbar.css({ width: '0%' })
        $('#progress_status').html '0%'

        @

    printFileDropzone: () =>
        #
        # dropzone
        #
        dropzone = document.getElementById('print-file-dropzone')
        dropzone.ondragover = (e) =>
            e.preventDefault()
            @
        dropzone.ondrop = (e) =>
            e.preventDefault()
            dropzone_files = e.dataTransfer.files
            @uploadPrintDataNow(dropzone_files)
            @ 

        #
        # Clickable Button
        #
        clickable_button = $('#print_data_file')

        clickable_button.on('change', (e) =>
            files = e.srcElement.files
            @uploadPrintDataNow(files)
        )
        @

    uploadPrintDataNow: (files) =>
        $('#printDataModal').modal('hide')
        $('#file-upload-progressbar').modal('toggle')
        # show loader
        _h.loader true
        # form data
        formData = new FormData()
        
        # add print_data_file to form data
        if !!files
            $.each(files, (i, item) ->
                formData.append('print_data_file', item)
                $('#file-name').html item.name
            )

        # add flag
        formData.append('upload_print_data_file', 1)
        # add model
        formData.append('position', @model.get('position') )
        @resetProgressbar()
        # send
        $.ajax(
            type: 'post'
            data: formData
            url: "/resource/print/cart-summary"
            cache: false
            contentType: false
            processData: false
            success: @success
            error: @error
            progress: @progressbar
        )
        # return self
        @

    success: (res) =>
        _h.log res
        # set model
        model = new App.Web.Models.Cart_Item(res)
        model.computePriceAndEstimatedDate()
        
        if !!@context
            # set current position
            model.set('position', @cart_model.get('position'))
            # change model
            @context.model = model
            # get cart
            cart = new App.Web.Collections.Cart()
            # render cart
            cart.fetch().then () =>
                @base_context.collection = cart
                # rerender parent item
                @base_context.render()

        # hide loader
        _h.loader false
        # hide modal
        setTimeout () ->
            $('#file-upload-progressbar').modal('toggle')
        , 1500
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