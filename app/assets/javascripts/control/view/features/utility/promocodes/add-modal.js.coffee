# Features Utility Promocode View Add Modal
class App.Control.Views.AddUtilityPromocodeModal extends App.Views.Base
    el: '#App-Views-AddUtilityPromocodeModal'
    PERIOD_DISCOUNT_TYPE: 2
    SUBMISSION_TIME_DISCOUNT_TYPE: 1
    DISCOUNT_BY_PERCENT_TOTAL_SALES: 1
    DISCOUNT_BY_AMOUNT: 2

    events: () =>
        {        
            'click .save' : 'save'
            'change #type' : 'switchSection'
            'change #discount' : 'switchDiscount'
        }
    
    render: () =>
        # select picker
        _h.selectPicker '.select-picker'
        # date picker
        _h.datePicker '.date-picker'
      
    switchDiscount: (dis) =>
        # get amount_section and percent_section
        amount_section = @$el.find('#amount_section')
        percent_section = @$el.find('#percent_section')
        # get discount selected value
        discount = dis.target.value
        # compare
        if parseInt(discount) == @DISCOUNT_BY_PERCENT_TOTAL_SALES
            percent_section.show()
            amount_section.hide()
            # clear amount settings
            @$el.find('input#amount').val('')
        else if parseInt(discount) == @DISCOUNT_BY_AMOUNT
            percent_section.hide()
            amount_section.show()
            # clear percent settings
            @$el.find('input#percent').val('')


    switchSection: (dis) =>
        # get date_section and time_section
        date_section = @$el.find('#date_section')
        time_section = @$el.find('#time_section')
        # get type selected value
        type = dis.target.value
        # compare
        if parseInt(type) == @PERIOD_DISCOUNT_TYPE
            time_section.hide()
            date_section.show()
            # clear time settings
            @$el.find('#time_from').val('')
            @$el.find('#time_to').val('')

        else if parseInt(type) == @SUBMISSION_TIME_DISCOUNT_TYPE
            date_section.hide()
            time_section.show()
            # clear date settings
            @$el.find('#date_from').val('')
            @$el.find('#date_to').val('')

        else
            # hide and remove values of time settings
            time_section.hide()
            # clear time settings
            @$el.find('#time_from').val('')
            @$el.find('#time_to').val('')
            # hide and remove values of date settings
            date_section.hide()
            # clear date settings
            @$el.find('#date_from').val('')
            @$el.find('#date_to').val('')

        # return self
        @

    save: () =>
        # show loader
        _h.loader true
        # get data
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        # add new record now
        @collection.create( 
            # data
            data, 
            # response settings
            { wait: true, success: @success, error: @error })

    success: () ->
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully saved new record.'
        # hide modal
        $('#App-Views-AddUtilityPromocodeModal').modal('toggle')
        # reset values
        $('form')[0].reset()

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

