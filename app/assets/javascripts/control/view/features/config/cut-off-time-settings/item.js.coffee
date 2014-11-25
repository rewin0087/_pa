# Features Config CutOffTimeSetting View list detail
class App.Control.Views.Features_Config_CutOffTimeSetting extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-ConfigCutOffTimeSettingsDetail'

    initialize: () =>
        @model.on 'change', @render, @
        @model.on 'destroy', @unRender, @

    events: () ->
        {        
            'click #edit' : 'edit'
            'click #delete' : 'delete'
        }

    edit: () =>
        # initialize Edit Modal and pass the current model for the data
        editModal = new App.Control.Views.EditConfigCutOffTimeSettingsModal({ model : @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-EditConfigCutOffTimeSettingsModal-Target"]').html html
        # call timepicker
        _h.timepicker '.edit-modal .bfh-timepicker', 
            name: 'label'
            mode: '12h'
            time: @model.get('label')
        # set masking for value
        _h.timeMasking '#value'

     delete: () =>
        # initialize Edit Modal and pass the current model for the data
        deleteModal = new App.Control.Views.DeleteConfigCutOffTimeSettingsModal({ model : @model })
        # get the html and rendered data to the html
        html = deleteModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-DeleteConfigCutOffTimeSettingsModal-Target"]').html html

    unRender: () =>
        # remove from html this current record
        @remove()
