# Product Printing View Add Modal
class App.Control.Views.AddProductPrintingPaperTypeModal extends App.Views.Base
    el: '#App-Views-AddProductPrintingPaperTypeModal'

    events: () =>
        {        
            'click .save' : 'save'
        }

    render: () =>
        # render CutOffTime Data
        @renderCutOffTime()
        # render Printers
        @renderPrinters()
        # return self
        @

    renderPrinters: () =>
        # get paper printer select input
        paper_printer_input = @$el.find('select#paper_printer_id')
        # clear select
        paper_printer_input.html('')
        # render each row
        @printers.each (printer) ->
            paper_printer_input.append('<option value="' + printer.get('id') + '">' + printer.get('name') + '</option>')
        # select picker
        _h.selectPicker '#paper_printer_id'

        @

    renderCutOffTime: () =>
        # get cut off select input
        cut_off_select_input = @$el.find('select#cutoff_time_id')
        # clear select
        cut_off_select_input.html('')
        # render each row
        @cutOffTime.each (cutOff) ->
            cut_off_select_input.append('<option value="' + cutOff.get('id') + '">' + cutOff.get('label') + '</option>')
        # select picker
        _h.selectPicker '#cutoff_time_id'

        @

    save: () =>
        # show loader
        _h.loader true
        # form data
        formData = new FormData()
        # get data
        form = @$el.find('form')
        # price list
        file_price_list = form.find('#file_price_list')
        # finishing list
        file_finishing_list = form.find('#file_finishing_list')
        # serialize form and get data
        data = _h.serializeForm form
        # append data
        $.each(data, (i, item) ->
            formData.append(i, item)
            _h.log item
        )
        # add price list file
        if !!file_price_list
            $.each(file_price_list[0].files, (i, item) ->
                formData.append('file_price_list', item)
                _h.log item
            )
        # add finishing list file
        if !!file_finishing_list[0]
            $.each(file_finishing_list[0].files, (i, item) ->
                formData.append('file_finishing_list', item)
                _h.log item
            )

        $.ajax(
            type: 'post'
            data: formData
            url: "/resource/products/printing/paper-types"
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
        model = new App.Control.Models.Products_Printing_PaperType(res)
        # add to collection
        @collection.add(model)
        _h.log model
        _h.log @collection
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully created new record.'
        # hide modal
        $('#App-Views-AddProductPrintingPaperTypeModal').modal('toggle')
        # remove selected
        $('.selectpicker li').removeAttr('selected')
        # hide remove
        $('.file-remove').hide()
        # reset fields
        @$el.find('form')[0].reset()
        
    error: (response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

