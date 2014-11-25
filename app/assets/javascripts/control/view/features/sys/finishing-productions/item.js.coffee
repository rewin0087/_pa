# Sys Finishing Productions list detail View
class App.Control.Views.Features_Sys_FinishingProduction extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-SysFinishingProductionsDetail'

    initialize: () =>
        @model.on 'change', @render, @

    events: () ->
        {        
            'click #edit' : 'edit'
        }

    edit: () =>
        _h.log 'edit'
        # initialize Edit Sys PaperFinishingType Modal and pass the current model for the data
        editModal = new App.Control.Views.EditSysFinishingProductionsModal({ model: @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-EditSysFinishingProductionsModal-Target"]').html html
        # get File to Upload
        _h.getFileToUpload '.edit-modal .file-upload'
        # return self
        @
        