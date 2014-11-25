# Me Info View list
class App.Web.Views.Me_Infos extends App.Views.Base
    template: 'App-Views-EditBasicInfo'
    
    initialize: () ->
        if @model.get('user_info').mobile_number == "" or @model.get('user_address').building_name == "" or @model.get('user_address').street == ""  or @model.get('user_address').telephone_number == "" 
            $('#inc_profile').removeClass('hide')
            $('#inc_profile').addClass('in')

    events: () =>
        {        
            'click .update' : 'update'
            'click #is_corporate' : 'is_corporate'
            'click #is_primary' : 'is_primary'
        }
    
    is_corporate: () =>
        _h.log 'is_corporate'
        $('#corporate-wrapper').addClass('in')
        $('#is_primary').prop('checked', false)
        $('#is_corporate').prop('checked', true)
    
    is_primary: () =>
        _h.log 'is_primary'
        $('#corporate-wrapper').removeClass('in')
        $('#is_primary').prop('checked', true);
        $('#is_corporate').prop('checked', false)
    
    update: () =>
        _h.log 'edit'
         # show loader
        _h.loader true
        # get data
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        _h.log data
        # add new group now
        @model.save data,
            success: @success
            error: @error

    success: () ->
        _h.loader false
        # show notification message
        _h.message 'success', 'Basic Info Successfully Updated!'
        # hide modal
        # $('div.edit-modal').modal('toggle')
        # reset name
        # @$('form')[0].reset()
        
    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error