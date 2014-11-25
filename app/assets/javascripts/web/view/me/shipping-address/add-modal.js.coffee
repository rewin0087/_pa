# Me Address View Add Modal
class App.Web.Views.AddShippingAddressModal extends App.Views.Base
    el: '#App-Views-AddShippingAddressModal'

    events: () =>
        {        
            'click .save' : 'save'
            'click #btn_is_corporate' : 'is_corporate'
            'click #btn_is_primary' : 'is_primary'
        }
 
    is_corporate: () =>
        # _h.log 'is_corporate'
        # $('.company_name').removeClass('hide')
        # $('.company_name').addClass('in')
        # $('.delivery_cutoff_time_id').addClass('hide')
        # $('.delivery_cutoff_time_id').removeClass('in')
        $('button#btn_is_corporate').addClass('active')
        $('button#btn_is_primary').removeClass('active')
    
    is_primary: () =>
        # _h.log 'is_primary'
        # $('.company_name').removeClass('in')
        # $('.company_name').addClass('hide')
        # $('.delivery_cutoff_time_id').addClass('in')
        # $('.delivery_cutoff_time_id').removeClass('hide')
        $('button#btn_is_corporate').removeClass('active')
        $('button#btn_is_primary').addClass('active')

    save: () =>
        _h.log 'add'
        # show loader
        _h.loader true
        # customize data for address type
        if $('button#btn_is_corporate').hasClass('active')
            $('input#is_corporate').val('1')
            _h.log '1'
        if $('button#btn_is_primary').hasClass('active')
            $('input#is_primary').val('1')
            _h.log '2'
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
        $('#App-Views-AddShippingAddressModal').modal('toggle')
        # reset value
        $('#btn_is_corporate').removeClass('active')
        $('#btn_is_primary').removeClass('active')
        $('#is_corporate').removeClass('active')
        $('#is_primary').removeClass('active')
        $('#receiving_first_name').val('')
        $('#receiving_last_name').val('')
        $('#company_name').val('')
        $('#postal_code1').val('')
        $('#postal_code2').val('')
        $('#address').val('')
        $('#building_name').val('')
        $('#telephone_number').val('')
        $('#delivery_cutoff_time_id').val('')

        
    error: (model, response) ->
        # hide loader
        _h.log 'Error'
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

