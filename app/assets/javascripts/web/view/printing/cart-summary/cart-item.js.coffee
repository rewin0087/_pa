# Printing Cart Item list detail View
class App.Web.Views.Product_Printing_Cart_Item extends App.Views.Base
    tagName: 'div'
    className: 'row mT10 text-left'
    template: 'App-Views-Cart-Summary-Item'
    context: null
    user_addresses: null

    initialize: () =>
        # render price and date
        @renderPriceAndEstimatedDate()
        @

    events: () ->
        {        
            'click .update-name' : 'updateName'
            'click .duplicate-item' : 'duplicateItem'
            'click .remove-item' : 'removeItem'
            'click .print_data_trigger' : 'showModalForPrintData'
            'click .proof_data_trigger' : 'showModalForProofData'
            'click .edit-order-details' : 'editOrderDetails'
            'click .show-finishings' : 'showFinishingModal'
            'click .update_note' : 'updateNote'
        }

    updateNote: (e) =>
        e.preventDefault()
        modal = new App.Web.Views.Printing_Upload_Data_Note_Modal({ model: @model })
        modal.context = @
        modal.from_cart_summary = 1

        $('div[data-target-template="data-note-target"]').html modal.renderFromCartSummary().el
        $('#item-data-note').modal('toggle')

        @

    showFinishingModal: () =>

        @

    render: () =>
        template = _h.template(@template)
        setTimeout () =>
            @$el.html template( @model.toJSON() )
        , 0
        @

    renderPriceAndEstimatedDate: () =>
        # compute price and estiamted date
        @model.computePriceAndEstimatedDate()
        # return self
        @
        
    editOrderDetails: () =>
        @model.set('edit_order_detail', 1)
        @model.urlRoot = '/resource/print/cart-summary'

        # save
        @model.save [],
            success: @redirectToOptions
            error: @error
        # return self
        @

    redirectToOptions: () =>
        window.location.href = '/printing/setup-options'
        # return self
        @

    updateName: () =>
        _h.log @model
        # initiate form
        givenNameForm = new App.Web.Views.Printing_Setup_Option_GivenName({ model: @model })
        # set cart model
        givenNameForm.cart_model = @model
        # set context
        givenNameForm.context = @
        # set base context
        givenNameForm.base_context = @context
        # render view
        $('div[data-target-template="given-name-target"]').html givenNameForm.render().el
        # render name
        givenNameForm.renderFromCartSummary()
        # return self
        @

    duplicateItem: () =>
        # get target DOM
        dom = $('div[data-target-template="duplicate-item-modal-target"]')
        # empty dom
        dom.html ''
        # pass model to duplicate modal
        modal = new App.Web.Views.Printing_Cart_Summary_Duplicate_Modal_Item({ model: @model })
        modal.context = @context
        # render view
        dom.html modal.render().el
        # return self
        @

    removeItem: () =>
        # get target DOM
        dom = $('div[data-target-template="remove-item-modal"]')
        # empty dom
        dom.html
        # pass model to duplicate modal
        modal = new App.Web.Views.Printing_Cart_Summary_Remove_Modal_Item({ model: @model })
        modal.context = @context
        # render view
        dom.html modal.render().el
        # return self
        @

    showModalForPrintData: () =>
        # get dom
        dom = $('div[data-target-template="print-data-item-modal"]')
        # empty dom
        dom.html ''
        # initialize modal
        modal = new App.Web.Views.Printing_Cart_Summary_Print_Data_Modal_Item({ model: @model })
        # base context
        modal.base_context = @context
        # set cart model
        modal.cart_model = @model
        # set context
        modal.context = @
        # render modal
        $('div[data-target-template="print-data-item-modal"]').html modal.render().el
        # initialize dropzone
        modal.printFileDropzone()
        # init button uploader
        _h.getFileToUpload '.file-upload'
        # return self
        @

    showModalForProofData: () =>
        # get dom
        dom = $('div[data-target-template="proof-data-item-modal"]')
        # empty dom
        dom.html ''
        # initialize modal
        modal = new App.Web.Views.Printing_Cart_Summary_Proof_Data_Modal_Item({ model: @model })
        # base context
        modal.base_context = @context
        # set cart model
        modal.cart_model = @model
        # set context
        modal.context = @
        # render modal
        $('div[data-target-template="proof-data-item-modal"]').html modal.render().el
        # initialize dropzone
        modal.proofFileDropzone() 
        # init button uploader
        _h.getFileToUpload '.file-upload'
        # return self
        @

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent else responseContent.error
        # show error
        if !!error.message
            _h.message 'error', error.message
        else
            _h.message 'error', 'Sorry something went wrong while processing your request. Please try again later'
        # reload page if reload response received
        if !!error.reload
            location.reload()