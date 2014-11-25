# Group View Add Modal
class App.Control.Views.AddGroupModal extends App.Views.Base
    el: '#App-Views-AddGroupModal'

    events: () =>
        {        
            'click .save' : 'saveGroup'
        }

    saveGroup: () =>
        # show loader
        _h.loader true
        # get data
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        # add new group now
        group = @collection.create( 
            # data
            data, 
            # response settings
            { wait: true, success: @success, error: @error })

    success: () ->
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully saved new group.'
        # hide modal
        $('#App-Views-AddGroupModal').modal('toggle')
        # reset name
        @$('#name').val('')
    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

