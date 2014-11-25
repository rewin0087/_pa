# Sys Bad Data Error Option list detail View
class App.Control.Views.Features_Sys_BadDataErrorOption extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-SysBadDataErrorOptionDetail'

    initialize: () =>
        @model.on 'change', @render, @

    events: () ->
        {        
            'click #edit' : 'edit'
        }

    edit: () =>
        _h.log 'edit'
        # initialize Edit Sys BadDataErrorOption Modal and pass the current model for the data
        editModal = new App.Control.Views.EditSysBadDataErrorOptionModal({ model: @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-EditSysBadDataErrorOptionModal-Target"]').html html
        # return self
        @
        