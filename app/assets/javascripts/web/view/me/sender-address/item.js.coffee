# Me Address View list detail
class App.Web.Views.Me_SenderAddress extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-SenderAddressDetails'

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
        editModal = new App.Web.Views.EditSenderAddressModal({ model : @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-EditSenderAddressModal-Target"]').html html
        
     delete: () =>
        # initialize Edit Modal and pass the current model for the data
        deleteModal = new App.Web.Views.DeleteSenderAddressModal({ model : @model })
        # get the html and rendered data to the html
        html = deleteModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-DeleteSenderAddressModal-Target"]').html html

    unRender: () =>
        # remove from html this current record
        @remove()
