# Backend View list detail
class App.Control.Views.Users_Backend extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-BackendDetail'

    initialize: () =>
        @model.on 'change', @render, @
        @model.on 'destroy', @unRender, @

    events: () ->
        {        
            'click #edit_backend' : 'editBackend'
            'click #delete_backend' : 'deleteBackend'
        }

    editBackend: () =>
        _h.loader true
        # initialize Edit Backend Modal and pass the current model for the data
        editBackendModal = new App.Control.Views.Users_EditBackendModal({ model : @model })
        # get the html and rendered data to the html
        html = editBackendModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-EditBackendModal-Target"]').html html
        _h.loader false

     deleteBackend: () =>
        # initialize Edit Backend Modal and pass the current model for the data
        deleteBackendModal = new App.Control.Views.Users_DeleteBackendModal({ model : @model })
        # get the html and rendered data to the html
        html = deleteBackendModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-DeleteBackendModal-Target"]').html html

    unRender: () =>
        # remove from html this current record
        @remove()
