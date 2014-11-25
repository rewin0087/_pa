# Sys Paper Finishing Type list detail View
class App.Control.Views.Features_Sys_PaperFinishingType extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-SysPaperFinishingTypeDetail'

    initialize: () =>
        @model.on 'change', @render, @

    events: () ->
        {        
            'click #edit' : 'edit'
        }

    edit: () =>
        _h.log 'edit'
        # initialize Edit Sys PaperFinishingType Modal and pass the current model for the data
        editModal = new App.Control.Views.EditSysPaperFinishingTypeModal({ model: @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-EditSysPaperFinishingTypeModal-Target"]').html html
        # return self
        @
        