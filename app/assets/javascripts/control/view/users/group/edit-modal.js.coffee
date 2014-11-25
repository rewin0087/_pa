# Group View Edit Modal
class App.Control.Views.EditGroupModal extends App.Views.Base
    template: 'App-Views-EditGroupModal'

    events: () =>
        {        
            'click .update' : 'updateGroup'
        }

    updateGroup: () =>
        _h.log 'edit'
        name = @$('#name').val()
        # get data
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        # add new group now
        @model.save data,
            success: @success
            error: @error


    success: () ->
        # show notification message
        _h.message 'success', 'Successfully updated this group.'
        # hide modal
        $('div.edit-group-modal').modal('toggle')
        # reset name
        @$('#name').val('')
    error: (model, response) ->
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

