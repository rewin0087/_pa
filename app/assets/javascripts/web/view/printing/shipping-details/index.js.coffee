# Printing Shipping Details Index View
class App.Web.Views.Printing_Shipping_Details_Index extends App.Views.Collection
    el: '#select-options'
    user_addresses: null
    cartHolder: null
    userAddressesCollection: null
    counter: 0
    grand_total: 0
    payment: null
    that: null

    initialize: () =>
        $('.terms-content').enscroll({
            showOnHover: true,
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
        });

        $('.shipping-address-content').enscroll({
            showOnHover: true,
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
        });

        _h.chosenWithSearch '.fancy'

    events: () =>
        {        
            'click .heading' : 'heading'
            'click .address-book' : 'address_book'
            'click #edit' : 'edit'
            'click #delete' : 'delete'
            'click .add' : 'add'
            'click .cancel' : 'cancel'
            'click .next' : 'next'
            'click .save-first-time' : 'SaveFirstTime'
        }

    render: () =>
        that = @
        payment_button = @$el.find('.iCheck-helper')
        parent = payment_button.parent()
        payment_button.on 'click', (e) ->
            @value = e.currentTarget.parentElement.children[0].value
            @actions = e.currentTarget.parentElement.children[0].name
            if @actions=='terms_and_conditions'
                shippingAddress = $("input#shippingAddress:checked").val()
                that.onChangeShippingAddress (shippingAddress)
        @refreshAddressOptions()
        @

    address_book: () =>

        $("div.shipping-address").slideToggle(500)
    
    add: () =>
        addModal = new App.Web.Views.AddPrintingShippingAddressModal({ collection: @userAddressesCollection })
        addModal.context = @
        
        $('[data-target-template="add-shipping-modal"]').html addModal.render().el
        _h.chosenWithSearch '.fancy'

    edit: () =>
        model = new App.Web.Models.Me_ShippingAddress()
        editModal = new App.Web.Views.EditPrintingShippingAddressModal ({ model : model })
        editModal.context = @

        $('[data-target-template="App-Views-EditPrintingShippingAddressModal-Target"]').html editModal.render().el
        _h.chosenWithSearch '.fancy'
        
    delete: () =>
        model = new App.Web.Models.Me_ShippingAddress()
        deleteModal = new App.Web.Views.DeletePrintingShippingAddressModal({ model : model })
        deleteModal.context = @

        $('[data-target-template="App-Views-DeletePrintingShippingAddressModal-Target"]').html deleteModal.render().el
        _h.chosenWithSearch '.fancy'        
   
    next: () =>
        model = new App.Web.Models.ShippingDetails()
        model.urlRoot = '/resource/print/shipping-details'
        model.set('next', 1)
        form = $('form')
        data = _h.serializeForm form
        model.save data,
            success: @successNext, 
            error: @error

    heading: (e) =>
        if $(e.target).find('b.down').hasClass('hide')            
            $(e.target).find('b.down').removeClass('hide')
            $(e.target).find('b.left').hide()
        else
            $(e.target).find('b.down').addClass('hide')
            $(e.target).find('b.left').show()
        
        $(e.target).next(".details").slideToggle(500)

    cancel: () =>
        $("hr.delivery-info-divider").show()
        $("div.main-address").show()
        $("div.link").show()
        $("div.caption").show()
        $("div.shipping-address-form").slideToggle(500)
    
    refreshAddressOptions: () =>
        userAddresses = new App.Web.Collections.Me_ShippingAddresses()
        userAddresses.fetch().then () =>
            if userAddresses.length >= 1
                _h.log 'if'
                $(".existing-address").show()
                @userAddressesCollection = userAddresses
                userAddresses = userAddresses.groupBy( (model) ->
                    model.get('type')
                )
                @user_addresses = userAddresses
                @renderDeliveryAddressOption()
                @renderMainAddressOption()
                $('input#shippingAddress').attr("checked", true);
            else
                _h.log 'else'
                $("div.new-shipping-address").show()
                $("form.new-shipping-address").show()
                $("div.existing-address").hide()
        @

    renderDeliveryAddressOption: () =>
        if !!@user_addresses[2] or !!@user_addresses[0]
            delivery_addresses = @user_addresses[2]
            delivery_addresses_main = @user_addresses[0]

            sender_option = @$el.find('div.shipping-address-content')
            sender_option.html ''
            
            _.map delivery_addresses_main, (address) =>
                sender_option.append('<div class="row layer"><p class="heading"><input type="radio" name="shippingAddress" id="shippingAddress" value="' + address.get('id') + '">  ' + 
                    address.get('company_name') + ', ' + address.get('receiving_first_name') + ' ' + address.get('receiving_last_name') + '<span class="pull-right"><b class="down fa fa-caret-down hide"></b><b class="left fa fa-caret-left"></b></span></p><div class="details" style="padding-left: 22px;">' + 
                    address.get('receiving_first_name') + ' '+ address.get('receiving_last_name') + '<a href="#" id="delete" data-toggle="modal" data-target=".delete-modal-shipping"><span class="pull-right red-button btn btn-xs">DELETE</span></a>' + 
                        '&nbsp;<a href="#" id="edit" data-toggle="modal" data-target=".edit-modal-shipping"><span class="pull-right blue-button btn btn-xs">EDIT</span></a><br />' +
                    # address.get('receiving_first_name') + ' '+ address.get('receiving_last_name') + '<br />' +
                    address.get('building_name') + '<br />' +
                    address.get('street') + '<br />' +
                    'Mobile: ' + address.get('mobile_number') + '<br />' +
                    'Tel: ' + address.get('telephone_number') + '<br /></div></div>')

            _.map delivery_addresses, (address) =>
                sender_option.append('<div class="layer"><p class="heading"><input type="radio" name="shippingAddress" id="shippingAddress" value="' + address.get('id') + '">  ' + 
                    address.get('company_name') + ', ' + address.get('receiving_first_name') + ' ' + address.get('receiving_last_name') + '<span class="pull-right"><b class="down fa fa-caret-down hide"></b><b class="left fa fa-caret-left"></b></span></p><div class="details" style="padding-left: 22px;">' + 
                    address.get('receiving_first_name') + ' '+ address.get('receiving_last_name') + '<a href="#" id="delete" data-toggle="modal" data-target=".delete-modal-shipping"><span class="pull-right red-button btn btn-xs">DELETE</span></a>' + 
                        '&nbsp;<a href="#" id="edit" data-toggle="modal" data-target=".edit-modal-shipping"><span class="pull-right blue-button btn btn-xs">EDIT</span></a><br />' +
                    # address.get('receiving_first_name') + ' '+ address.get('receiving_last_name') + '<br />' +
                    address.get('building_name') + '<br />' +
                    address.get('street') + '<br />' +
                    'Mobile: ' + address.get('mobile_number') + '<br />' +
                    'Tel: ' + address.get('telephone_number') + '<br /></div></div>')

    renderMainAddressOption: () =>
        if !!@user_addresses[0]
            delivery_addresses_main = @user_addresses[0]

            sender_option = @$el.find('div.main-address')
            sender_option.html ''
            
            _.map delivery_addresses_main, (address) =>
                sender_option.append('<div class="layer"><p class="heading"><input type="radio" name="shippingAddress" id="shippingAddress" value="' + address.get('id') + '">  ' + 
                    address.get('company_name') + ', ' + address.get('receiving_first_name') + ' ' + address.get('receiving_last_name') + '<span class="pull-right"><b class="down fa fa-caret-down hide"></b><b class="left fa fa-caret-left"></b></span></p><div class="main details" style="padding-left: 22px;">' + 
                    address.get('receiving_first_name') + ' '+ address.get('receiving_last_name') + '<a href="#" id="delete" data-toggle="modal" data-target=".delete-modal-shipping"><span class="pull-right red-button btn btn-xs">DELETE</span></a>' + 
                        '&nbsp;<a href="#" id="edit" data-toggle="modal" data-target=".edit-modal-shipping"><span class="pull-right blue-button btn btn-xs">EDIT</span></a><br />' +
                    address.get('building_name') + '<br />' +
                    address.get('street') + '<br />' +
                    'Mobile: ' + address.get('mobile_number') + '<br />' +
                    'Tel: ' + address.get('telephone_number') + '<br /></div></div>')

    updateCartNotification: () =>

        # get cart notification DOM
        cart_notification = $('#cartnotification')

        # get total size collection
        total_cart = @collection.length

        if !!total_cart && total_cart > 0
            cart_notification.show()
            
        # render cart total count
        $('.content', cartnotification).html total_cart

        # return self
        @

    onChangeShippingAddress: (value) =>
        # value = e.target.value
        # find the model where model id is equal to value
        @userAddressesCollection.find (model) =>
            # set condition to get the current model that we need
            if model.get('id') == value
                # set url
                model.urlRoot = '/resource/print/shipping-details'
                # enable current selection storing for paper size
                model.set('current_selection_shipping_address', 1)
                # send request to save current selection for paper size
                model.save []
        # return self
        @

    successNext: () =>
        
        window.location.replace("/printing/final-summary")

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

    SaveFirstTime: () =>
        userAddresses = new App.Web.Collections.Me_ShippingAddresses()
        _h.log 'add'
        # show loader
        _h.loader true
        # get data
        form = @$el.find('form.new-shipping-address')
        # serialize form and get data
        data = _h.serializeForm form
        # add new record now
        userAddresses.create( 
            # data
            data, 
            # response settings
            { wait: true, success: @SuccessFirstTime, error: @error })

    SuccessFirstTime: () =>
        # show notification message
        _h.message 'success', 'Successfully saved new record.'
        $(".new-shipping-address").hide()
        $(".existing-address").show()
        # hide loader
        _h.loader false
        
        @refreshAddressOptions()
        @
