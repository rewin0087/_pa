# Sys Paper Finishing Type list detail View
class App.Control.Views.Features_Sys_FinishingProductionsCategory extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-SysFinishingProductionsCategoryDetail'

    events: () ->
        {        
            'click #edit' : 'edit'
        }

    edit: () =>
        _h.log 'edit'
        # initialize Edit Sys PaperFinishingType Modal and pass the current model for the data
        editModal = new App.Control.Views.EditSysFinishingProductionsCategoryModal({ model: @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it  now in the page and show modal
        $('[data-target-template="App-Views-EditSysFinishingProductionsCategoryModal-Target"]').html html
        # return self
        @
        