# Sys BadDataError View Edit Modal
class App.Control.Views.EditSysBadDataErrorModal extends App.Views.Base
    template: 'App-Views-SysEditBadDataErrorModal'

    events: () =>
        {        
            'click .update' : 'update'
        }

    update: () =>
        # show loader
        _h.loader true
        # get the form
        form = @$('form')
        # serialize the form to get the data
        data = _h.serializeForm(form)
        # save now the data
        @model.save data,
            success: @success
            error: @error

    success: () ->
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully updated this Paper Color.'
        # hide modal
        $('div.edit-modal').modal('toggle')
        # reset form
        @$('form')[0].reset()

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error