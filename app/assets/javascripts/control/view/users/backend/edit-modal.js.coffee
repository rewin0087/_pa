# Backend View Edit Modal
class App.Control.Views.Users_EditBackendModal extends App.Views.Base
    template: 'App-Views-EditBackendModal'

    events: () =>
        {        
            'click .update' : 'updateBackend'
        }

    render: () ->
        template = _h.template(@template)
        @$el.html template( @model.toJSON() )
        
        @renderCheckboxGroup()
        @
     
    renderCheckboxGroup: () ->
       # get user groups
        user_group = _.pluck @model.get('group'), 'group_id'
        # get group collection of all groups
        groupCollection = new App.Control.Collections.Group();
        # get DOM where to put group list
        _groupTemplate = @$el.find('#group-list')
        # show loader
        _h.loader true
        # fetch group collection
        groupCollection.fetch().then () ->
            # parse each group from collection
            groupCollection.each (group) ->
                 _groupTemplate.append('<div class="checkbox"><input name="groups" class="checkbox-group" type="checkbox" value="' + group.get('id') + '"> ' + group.get('name') + '</div>')
            # check all the group associated with the current user
            setTimeout () ->
                $.each(user_group, (i, grp) ->
                    checkbox = _groupTemplate.find('.checkbox-group[value="' + grp + '"]')
                    checkbox.prop('checked', true)
                )
            , 300
            # hide loader 
            _h.loader false

    updateBackend: () =>
        # get form
        form = @$el.find('form')
        # serialize form and get data
        data = _h.serializeForm form
        # edit backend now
        @model.save data,
            success: @success
            error: @error

    success: () ->
        # show notification message
        _h.message 'success', 'Successfully updated this backend user.'
        # hide modal
        $('div.edit-backend-modal').modal('toggle')
        # reset name
        @$('#name').val('')
    
    error: (model, response) ->
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

