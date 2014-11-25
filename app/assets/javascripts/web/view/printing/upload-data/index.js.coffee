# Printing Upload Data Index View
class App.Web.Views.Printing_Upload_Data_Index extends App.Views.Collection
    el: '#select-options'
    cart: null
    cartSummaryUrl: '/printing/cart-summary'
    box_content: '.box-content'

    events: () ->
        {
            'click #go-cart-summary' : 'goCartSummary'
            'click .clickable' : 'showBoxContent'
            'click .data-note' : 'dataNote'
        }

    dataNote: (e) =>
        e.preventDefault()
        modal = new App.Web.Views.Printing_Upload_Data_Note_Modal({ model: @cart })
        modal.context = @

        $('div[data-target-template="data-note-target"]').html modal.render().el
        $('#item-data-note').modal('toggle')
        @

    slideLoginNew: (e) =>
        e.preventDefault()
        $('.hide-form').slideUp()

        setTimeout () ->
            modal = new App.Web.Views.Printing_Upload_Data_New_User_Modal()
            modal.render()
            $('div.new-user').slideDown()
        , 100
        @

    slideLoginExist: (e) =>
        e.preventDefault()
        $('.hide-form').slideUp()
        
        setTimeout () ->
            modal = new App.Web.Views.Printing_Upload_Data_Existing_User_Modal()
            modal.render()
            $('div.existing-user').slideDown()
        , 100
        @

    render: () =>

        # initialize dropzone
        @printFileDropzone()
        @proofFileDropzone()
        # render uploaded data
        @renderData()
        # initialize toggle on login modal view
        
        # return self
        @

    loginModalListener: () =>
        _h.log 'listener'
        # login new
        login_new = $('#login_new')
        parent_login_new = login_new.parent()
        $('ins.iCheck-helper', parent_login_new).on 'click', (e) =>
            @slideLoginNew(e)

        # login exist
        login_exist = $('#login_exist')
        parent_login_exist = login_exist.parent()
        $('ins.iCheck-helper', parent_login_exist).on 'click', (e) =>
            @slideLoginExist(e)
        @

    progressbar: (evt) =>
        _h.log evt
        progressbar = @$el.find('.progress-bar')
        if !!evt.lengthComputable
            progress = parseInt( (evt.loaded / evt.total * 100), 10)
            console.log("Loaded " + progress + "%");
            progressbar.attr('aria-valuenow', progress)
            progressbar.css({ width: progress + '%' })
            @$el.find('#progress_status').html  progress + '%'

        @

    resetProgressbar: () =>
        progressbar = @$el.find('.progress-bar')
        progressbar.attr('aria-valuenow', 0)
        progressbar.css({ width: '0%' })
        @$el.find('#progress_status').html '0%'

    printFileUpload: (files) =>
        formData = new FormData()
        $('#file-upload-progressbar').modal('toggle')

        if !!files
            $.each(files, (i, item) ->
                formData.append('print_data_file', item)
                $('#file-name').html item.name
            )

        formData.append('upload_print_data_file', 1)
        # send
        $.ajax(
            type: 'post'
            data: formData
            url: "/resource/print/upload-data"
            cache: false
            contentType: false
            processData: false
            success: @success
            error: @error
            progress: @progressbar
        )
        @

    success: (object, res) =>
        @cart = new App.Web.Models.Cart_Item(object)
        # render data
        @renderData()
        # toggle modal
        setTimeout () =>
            $('#file-upload-progressbar').modal('toggle')
            $("#print_file").val('')
            $("#proof_file").val('')
            setTimeout () =>
                @resetProgressbar()
            , 300
        , 1500
        @

    renderData: () =>
        if !!@cart.get('print_data')
            @$el.find('a[data-target="print_file"] div').html 'Change ' + @cart.get('print_data').original_name
        if !!@cart.get('proof_data')
            @$el.find('a[data-target="proof_file"] div').html 'Change ' + @cart.get('proof_data').original_name
        @

    proofFileUpload: (files) =>
        formData = new FormData()
        $('#file-upload-progressbar').modal('toggle')

        if !!files
            $.each(files, (i, item) ->
                formData.append('proof_data_file', item)
                $('#file-name').html item.name
            )

        formData.append('upload_proof_data_file', 1)
        # send
        $.ajax(
            type: 'post'
            data: formData
            url: "/resource/print/upload-data"
            cache: false
            contentType: false
            processData: false
            success: @success
            error: @error
            progress: @progressbar
        )
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
            @printFileUpload(dropzone_files)
            @ 

        #
        # Clickable Button
        #
        clickable_button = document.getElementById('print_file')
        
        clickable_button.onchange = (e) =>
            files = e.srcElement.files
            @printFileUpload(files)
        @

    proofFileDropzone: () =>
        #
        # dropzone
        #
        dropzone = document.getElementById('proof-file-dropzone')
        dropzone.ondragover = (e) =>
            e.preventDefault()
            @
        dropzone.ondrop = (e) =>
            e.preventDefault()
            dropzone_files = e.dataTransfer.files
            @proofFileUpload(dropzone_files)
            @ 

        #
        # Clickable Button
        #
        clickable_button = document.getElementById('proof_file')
        clickable_button.onchange = (e) =>
            files = e.srcElement.files
            @proofFileUpload(files)
        @

    showBoxContent: (e) =>
        $('.box-upload').removeClass('box-upload-show')
        $(e.currentTarget).parent().addClass('box-upload-show')
        @

    goCartSummary: () =>
        if !@cart.get('proof_data') || !@cart.get('print_data')
            _h.message 'error', 'Please upload all the data file needed, or select from the cloud.'
        else
            # initialize model
            model = new App.Web.Models.Printing_Setup_Finishing()
            # set url
            model.urlRoot = '/resource/print/setup-finishing'
            # set add cart to model
            model.set('add_cart', 1)
            # save item to cart
            model.save [],
             success: @successAddToCart
             error: @error

        @

    successAddToCart: () =>
        window.location.href = @cartSummaryUrl
        @

    error: (response) =>

        $('#file-upload-progressbar').modal('toggle')
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
        if !!error.show_login
            userLoginModal = new App.Web.Views.Printing_Upload_Data_User_Login_Modal()

            $('div[data-target-template="upload-user-login"]').html userLoginModal.render().el
            @loginModalListener()
            setTimeout () =>
                $('.upload-login-modal').modal('toggle')
                
            , 100
        @

