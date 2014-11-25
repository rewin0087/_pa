# Features Config DeliveryCutoffTime View list detail
class App.Control.Views.Features_Config_DeliveryCutoffTime extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-ConfigDeliveryCutOffTimeDetail'

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
        editModal = new App.Control.Views.EditConfigDeliveryCutoffTimeModal({ model : @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-EditConfigDeliveryCutOffTimeModal-Target"]').html html
        # set masking for value
        _h.timeRangeMasking '#value'

     delete: () =>
        # initialize Edit Modal and pass the current model for the data
        deleteModal = new App.Control.Views.DeleteConfigDeliveryCutoffTimeModal({ model : @model })
        # get the html and rendered data to the html
        html = deleteModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-DeleteConfigDeliveryCutOffTimeModal-Target"]').html html

    unRender: () =>
        # remove from html this current record
        @remove()
