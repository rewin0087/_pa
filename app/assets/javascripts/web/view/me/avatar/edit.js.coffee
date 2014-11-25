class App.Web.Views.Me_EditAvatarModal extends App.Views.Base
    template: 'App-Views-EditAvatarModal-Target'
    
    events: () =>
        {        
            'click .update' : 'update'
        }

    update: () =>
        _h.log 'edit'
         # show loader
        _h.loader true
        # get data
        form = @$el.find('form')
        data = _h.serializeForm form
        # add new group now
        @model.save data,
            success: @success
            error: @error

    success: () ->
        _h.loader false
        # show notification message
        _h.message 'success', 'Avatar image sucessfully updated!'
        
    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error