# Product Printing PaperType View Edit Modal
class App.Control.Views.EditProductPrintingPaperTypeModal extends App.Views.Base
    template: 'App-Views-EditProductPrintingPaperTypeModal'

    events: () =>
        {        
            'click .update' : 'update'
        }

    render: () =>
        template = _h.template(@template)
        @$el.html template( @model.toJSON() )
         # render CutOffTime Data
        @renderCutOffTime()
        # render Printers
        @renderPrinters()
        # put finishing file name on the DOM
        if !!@model.get('finishing_file') == true
            @$el.find('#file_finishing_list_name').val(@model.get('finishing_file').original_name)
        # put pricing file name on the DOM
        if !!@model.get('pricing_file') == true
            @$el.find('#file_price_list_name').val(@model.get('pricing_file').original_name)
            
        # return self
        @

    renderPrinters: () =>
        # get cut off select input
        paper_printer_input = @$el.find('select#paper_printer_id')
        # clear select
        paper_printer_input.html('')
        # render each row
        @printers.each (printer) ->
            paper_printer_input.append('<option value="' + printer.get('id') + '">' + printer.get('name') + '</option>')
        # select printer
        paper_printer_input.find('option[value="' + @model.get('paper_printer_id') + '"]').prop('selected', true)
        # select picker
        setTimeout () ->
            _h.selectPicker '#paper_printer_id'
        , 500
        @

    renderCutOffTime: () =>
        # get cut off select input
        cut_off_select_input = @$el.find('select#cutoff_time_id')
        # clear select
        cut_off_select_input.html('')
        # render each row
        @cutOffTime.each (cutOff) ->
            cut_off_select_input.append('<option value="' + cutOff.get('id') + '">' + cutOff.get('label') + '</option>')
        # select printer
        cut_off_select_input.find('option[value="' + @model.get('cutoff_time_id') + '"]').prop('selected', true)
        # select picker
        setTimeout () ->
            _h.selectPicker '#cutoff_time_id'
        , 500
        @

    update: () =>
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
            url: "/resource/products/printing/paper-types/" + @model.get('id')
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