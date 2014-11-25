# Me Address View list detail
class App.Web.Views.Me_Avatar extends App.Views.Base
    template: 'App-Views-ListAvatar'

    initialize: () =>
        @model.on 'change', @render, @
        @model.on 'destroy', @unRender, @

    events: () ->
        {        
            'click #avatar_image_delete' : 'delete'
            'click #avatar_image_edit' : 'edit'
        }

    edit: () =>
        _h.log 'avatar edit'
        # initialize Edit Modal and pass the current model for the data
        editModal = new App.Web.Views.Me_EditAvatarModal({ model : @model })
        # get the html and rendered data to the html
        html = editModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-EditAvatarModal-Target"]').html html
        _h.getFileToUpload '.file-upload'
        
     delete: () =>
        # initialize Edit Modal and pass the current model for the data
        deleteModal = new App.Web.Views.DeleteShippingAddressModal({ model : @model })
        # get the html and rendered data to the html
        html = deleteModal.render().el
        # put it now in the page and show modal
        $('[data-target-template="App-Views-DeleteShippingAddressModal-Target"]').html html

    unRender: () =>
        # remove from html this current record
        @remove()
