# Group View list detail
class App.Control.Views.Group extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-GroupDetail'

    initialize: () =>
        @model.on 'change', @render, @
        @model.on 'destroy', @unRender, @

    events: () ->
        {        
            'click #edit_group' : 'editGroup'
            'click #delete_group' : 'deleteGroup'
        }

    editGroup: () =>
        # initialize Edit Group Modal and pass the current model for the data
        editGroupModal = new App.Control.Views.EditGroupModal({ model : @model })
        # get the html and rendered data to the html
        html = editGroupModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-EditGroupModal-Target"]').html html

     deleteGroup: () =>
        # initialize Edit Group Modal and pass the current model for the data
        deleteGroupModal = new App.Control.Views.DeleteGroupModal({ model : @model })
        # get the html and rendered data to the html
        html = deleteGroupModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-DeleteGroupModal-Target"]').html html

    unRender: () =>
        # remove from html this current record
        @remove()
