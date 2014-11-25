# Sys Bad Data Error list detail View
class App.Control.Views.Features_Sys_BadDataError extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-SysBadDataErrorDetail'

    initialize: () =>
        @model.on 'change', @render, @

    events: () ->
        {        
            'click #edit' : 'edit'
        }

    edit: () =>
        _h.log 'edit'
        # initialize Edit Sys BadDataError Modal and pass the current model for the data
        editModal = new App.Control.Views.EditSysBadDataErrorModal({ model: @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-EditSysBadDataErrorModal-Target"]').html html
        # return self
        @
        