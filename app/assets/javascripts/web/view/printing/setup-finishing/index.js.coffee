# Printing Setup Finishing Index View
class App.Web.Views.Printing_Setup_Finishing_Index extends App.Views.Collection
    el: '#select-options'
    cart: null
    checked: 'glyphicon glyphicon-record'
    uncheck: 'fa-circle-o fa'
    cartSummaryUrl: '/printing/cart-summary'
    total_finishing_price: 0
    total_finishing_tat: 0
    # cart item
    cart_item: null

    events: () ->
        {
            'click #update-given-name' : 'showUpdateGivenNameModal'
        }

    showUpdateGivenNameModal: () ->
        # initiate form
        givenNameForm = new App.Web.Views.Printing_Setup_Option_GivenName();
        # render view
        $('div[data-target-template="given-name-target"]').html givenNameForm.render().el
        # return self
        @

    render: () =>
        # render cart
        @renderCart()

        if @collection.length > 0

            @$el.find('#finishing-category-holder').html ''
            # add Item
            @collection.each(@addOne, @)
        # return self
        @

    addOne: (model) =>
        # initialize item view
        item = new App.Web.Views.Printing_Setup_Finishing_Category_Item({ model: model })

        # render item
        @$el.find('#finishing-category-holder').append item.render().el
        # return self
        @

    renderCart: () =>
        setTimeout () =>
            @cart_item = @cart
            if !!@cart.get('finishing')
                finishing = @cart.get('finishing')
                # set html to empty
                @$el.find('.finishing-final-holder').html ''
                # map entire finishing
                _.map finishing, @addOneFinishing, @

            if !!@cart.get('quantity_price')
                # add finishing and printing price
                sub_total = _h.currency_format( @total_finishing_price + parseFloat(@cart.get('quantity_price').price) )
                # add finishing and printing tat
                tat_total = @total_finishing_tat + parseInt(@cart.get('quantity_price').tat)
                # render sub total
                @$el.find('#total-price-selected').html 'AED ' + sub_total
                # render total tat
                @$el.find('#estimated-tat-selected strong').html tat_total
        , 500

        @

    addOneFinishing: (object) =>
        # initialize model
        model = new App.Web.Models.Printing_Setup_Finishing(object)
        # check selected category
        $('#finishing-category-' + model.get('parent').id).removeClass(@uncheck).addClass(@checked)
        # initialize finishing final item      
        finishingFinalItem = new App.Web.Views.Printing_Setup_Finishing_Final_Item({ model: model })
        # 
        @$el.find('.finishing-final-holder').append(finishingFinalItem.render().el)
        # add finishing price
        @total_finishing_price += parseFloat(model.get('pricing').price)
        # add finishing tat
        @total_finishing_tat += parseInt(model.get('pricing').turn_around)
        @
