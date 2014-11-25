# Me AddressModal View Edit Modal
class App.Web.Views.EditShippingAddressModal extends App.Views.Base
    template: 'App-Views-EditShippingAddressModal'

    events: () =>
        {        
            'click .update' : 'update'
            'click #is_corporate' : 'is_corporate'
            'click #is_primary' : 'is_primary'
        }

    is_corporate: () =>
        _h.log 'is_corporate'
        $('.company_name').removeClass('hide')
        $('.company_name').addClass('in')
        $('.delivery_cutoff_time_id').addClass('hide')
        $('.delivery_cutoff_time_id').removeClass('in')
        $('#is_corporate').addClass('active')
        $('#is_primary').removeClass('active')
    
    is_primary: () =>
        _h.log 'is_primary'
        $('.company_name').removeClass('in')
        $('.company_name').addClass('hide')
        $('.delivery_cutoff_time_id').addClass('in')
        $('.delivery_cutoff_time_id').removeClass('hide')
        $('#is_primary').addClass('active')
        $('#is_corporate').removeClass('active')

    update: () =>
        _h.log 'edit'
         # show loader
        _h.loader true
        # get data
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        # add new group now
        @model.save data,
            success: @success
            error: @error
            
    success: () ->
         # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully updated this record.'
        # hide modal
        $('div.edit-modal-shipping').modal('toggle')
        # reset name
        @$('form')[0].reset()

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

