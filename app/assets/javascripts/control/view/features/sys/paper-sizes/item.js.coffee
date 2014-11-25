# Sys Paper Size list detail View
class App.Control.Views.Features_Sys_PaperSize extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-SysPaperSizeDetail'

    initialize: () =>
        @model.on 'change', @render, @

    events: () ->
        {        
            'click #edit' : 'edit'
        }

    edit: () =>
        _h.log 'edit'
        # initialize Edit Sys PaperColor Modal and pass the current model for the data
        editModal = new App.Control.Views.EditSysPaperSizeModal({ model: @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-EditSysPaperSizeModal-Target"]').html html
        # return self
        @
        