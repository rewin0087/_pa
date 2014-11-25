# Printing Setup Option Index View
class App.Web.Views.Printing_Setup_Option_Index extends App.Views.Collection
    el: '#select-options'
    # DOM Select Options
    paperSizesOption: null
    paperTypesOption: null
    paperColorsOption: null
    # DOM QTY MODAL
    quantityModal: null
    # collections
    paperSizesCollection: null
    paperColorsCollection: null
    paperTypesCollection: null
    # current selection DOM
    current_selection: null
    # DOM setup-paper
    setupPaper: null
    # current selection MODEL
    currentSelectionModel: null
    # selectionModal
    selectionQuantitiesPrices: null
    # regroup selectionQuantitiesPrices
    reGroupselectionQuantitiesPrices: null
    # counter quantity table
    qty_row_counter: 0
    # total finishing price
    total_finishing_price: 0
    total_finishing_tat: 0
    # cart item
    cart_item: null

    events: () ->
        {
            'change #paper-size' : 'onChangePaperSize'
            'change #paper-type' : 'onChangePaperType'
            'change #paper-color' : 'onChangePaperColor'
            'click .qty-selected' : 'qtySelected'
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
        # set selection modal
        @quantityModal = @$el.find('#table-quantity-prices')
        # set current selection
        @current_selection = @$el.find('#current-selection')
        # set setupPaper
        @setupPaper = @$el.find('#setup-paper')
        # render Paper Sizes option
        @_renderPaperSizesOption()
        # render Paper Types option
        @_renderPaperTypesOption()
        # render Paper Colors option
        @_renderPaperColorsOption()
        # render quantities and prices table
        @_renderQuantitiesAndPrices()
        # render cart
        @renderCart()
        # return self
        @

    renderCart: () =>
        # get model
        model = new App.Web.Models.Printing_Setup_Options()
        # set url
        model.urlRoot = '/resource/print/setup-options/setup-paper/cart'
        # fetch data
        model.fetch().then () =>
            @cart_item = model
            # paper size select option
            if !!model.get('paper_size')
                @paperSizesOption.find('option[value="' + model.get('paper_size').id + '"]').prop('selected', true)

            # paper color select option
            if !!model.get('paper_color')
                @paperColorsOption.find('option[value="' + model.get('paper_color').id + '"]').prop('selected', true)

            # paper type select option
            if !!model.get('paper_type')
                @paperTypesOption.find('option[value="' + model.get('paper_type').id + '"]').prop('selected', true)

            # quantity and price
            if !!model.get('quantity_price')
                text = ""
                if parseInt(model.get('quantity_price').tat) > 1
                    text = model.get('quantity_price').quantity + " pcs, " + model.get('quantity_price').tat + " days, " + model.get('quantity_price').price
                else if parseInt(model.get('quantity_price').tat) <= 1
                    text = model.get('quantity_price').quantity + " pcs, 1 day, " + model.get('quantity_price').price

                # render selected value
                @setupPaper.find('#qty-price-value-holder').html text
            # finishing final
            setTimeout () =>

                if !!model.get('finishing')
                    finishing = model.get('finishing')
                    # map entire finishing
                    _.map finishing, @addOneFinishing, @
                
                if !!model.get('quantity_price')
                    # add finishing and printing price
                    sub_total = _h.currency_format( @total_finishing_price + parseFloat(model.get('quantity_price').price) )
                    # add finishing and printing tat
                    tat_total = @total_finishing_tat + parseInt(model.get('quantity_price').tat)
                    # render sub total
                    @$el.find('#total-price-selected').html 'AED ' + sub_total
                    # render total tat
                    @$el.find('#estimated-tat-selected strong').html tat_total
            , 500

            # set chosen
            _h.chosenWithSearch '.fancy'
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

    onRenderChanges: (res) =>
        @qty_counter = 0
        # get model
        model = new App.Web.Models.Printing_Setup_Options()
        # set url
        model.urlRoot = '/resource/print/setup-options/setup-paper'
        # fetch data
        model.fetch().then () =>

            # set selection model
            quantities_prices = model.get('quantities_prices')
            # create collection for quantities_prices
            @selectionQuantitiesPrices = new App.Web.Collections.Quantities_Prices()
            # set collection objects
            @selectionQuantitiesPrices.reset(quantities_prices)
            # get response
            @currentSelectionModel = res
            # change DOM value on paper size selected
            if !!@currentSelectionModel.get('paper_size')
                # render values
                @current_selection.find('#paper-size-selected').html @currentSelectionModel.get('paper_size').dex_en_name
            # change DOM value on paper color selected
            if !!@currentSelectionModel.get('paper_type')
                # render values
                @current_selection.find('#paper-type-selected').html @currentSelectionModel.get('paper_type').en_name
            # change DOM value on paper color selected
            if !!@currentSelectionModel.get('paper_color')
                # render values
                @current_selection.find('#paper-color-selected').html @currentSelectionModel.get('paper_color').dex_en_name
            # change DOM value on quantity price selected
            if !!@currentSelectionModel.get('quantity_price')
                # toggle modal
                $('#qtyModal').modal('hide')
                # render values
                @current_selection.find('#printing-price-selected').html 'AED ' + _h.currency_format(parseFloat(@currentSelectionModel.get('quantity_price').price))
                @current_selection.find('#quantity-selected').html @currentSelectionModel.get('quantity_price').quantity

                text = ""
                if parseInt(@currentSelectionModel.get('quantity_price').tat) > 1
                    text = @currentSelectionModel.get('quantity_price').quantity + " pcs, " + @currentSelectionModel.get('quantity_price').tat + " days, " + @currentSelectionModel.get('quantity_price').price
                else if parseInt(@currentSelectionModel.get('quantity_price').tat) <= 1
                    text = @currentSelectionModel.get('quantity_price').quantity + " pcs, 1 day, " + @currentSelectionModel.get('quantity_price').price

                # render selected value
                @setupPaper.find('#qty-price-value-holder').html text
            
            # finishing final
            setTimeout () =>
                if !!@currentSelectionModel.get('finishing')
                    finishing = @currentSelectionModel.get('finishing')
                    # clear holder content
                    @$el.find('.finishing-final-holder').html ''
                    # reset values
                    @total_finishing_price = 0
                    @total_finishing_tat = 0
                    # map entire finishing
                    _.map finishing, @addOneFinishing, @
                    
                if !!@currentSelectionModel.get('quantity_price')
                    # add finishing and printing price
                    sub_total = _h.currency_format( @total_finishing_price + parseFloat(@currentSelectionModel.get('quantity_price').price) )
                    # add finishing and printing tat
                    tat_total = @total_finishing_tat + parseInt(@currentSelectionModel.get('quantity_price').tat)
                    # render sub total
                    @$el.find('#total-price-selected').html 'AED ' + sub_total
                    # render total tat
                    @$el.find('#estimated-tat-selected strong').html tat_total
            , 500
            # fill quantity table
            if !!quantities_prices
                @renderQuantityTable()
            # hide loader
            _h.loader false
        # return self
        @

    qtySelected: (dis) =>
        # Get ID of the current selected
        id = $(dis.currentTarget).attr('data-model')
        # get model from the collection
        model = @selectionQuantitiesPrices.get(id)
         # set url
        model.urlRoot = '/resource/print/setup-options/setup-paper'
        # enable current selection storing for quantity and price
        model.set('current_selection_quantity_price', 1)
        # show loader
        _h.loader true
        # send request to save current selection for paper color
        model.save [],
            success: @onRenderChanges
            error: @error
        @

    renderQuantityTable: () =>
        # get tbody
        tbody = @quantityModal.find('tbody')
        # empty tbody
        tbody.html ''
        # group collection
        @reGroupselectionQuantitiesPrices = @selectionQuantitiesPrices.groupBy( (model) ->
            model.get('quantity')
        )

        @qty_row_counter = 0
        _.map @reGroupselectionQuantitiesPrices, @_addQuantityAndPrice, @

        @

    _addQuantityAndPrice: (array) =>
        if array.length > 0
            # get tbody
            tbody = @quantityModal.find('tbody')
            template = _.template '<tr id="qty-' + @qty_row_counter + '"><td id="qty-val-' + @qty_row_counter + '"></td><td id="qty-tat-1-' + @qty_row_counter + '" class="qty-selected"></td><td id="qty-tat-3-' + @qty_row_counter + '" class="qty-selected"></td><td id="qty-tat-5-' + @qty_row_counter + '" class="qty-selected"></td><td id="qty-tat-0-' + @qty_row_counter + '" class="qty-selected"></td></tr>'
            # append template
            tbody.append(template)
            # put quantity values
            tbody.find('#qty-' + @qty_row_counter + ' #qty-val-' + @qty_row_counter).html array[0].get('quantity')
            # map array 
            $.each(array, (i, model) =>
                # same day
                if(parseInt(model.get('tat')) == 0)
                    td = tbody.find('#qty-' + @qty_row_counter + ' #qty-tat-0-' + @qty_row_counter)
                    td.html model.get('price')
                    td.attr('data-model', model.get('id'))
                # day 1
                else if(parseInt(model.get('tat')) == 1)
                    td = tbody.find('#qty-' + @qty_row_counter + ' #qty-tat-1-' + @qty_row_counter)
                    td.html model.get('price')
                    td.attr('data-model', model.get('id'))
                # days 3
                else if(parseInt(model.get('tat')) == 3)
                    td = tbody.find('#qty-' + @qty_row_counter + ' #qty-tat-3-' + @qty_row_counter)
                    td.html  model.get('price')
                    td.attr('data-model', model.get('id'))

                # days 5
                else if(parseInt(model.get('tat')) == 5)    
                    td = tbody.find('#qty-' + @qty_row_counter + ' #qty-tat-5-' + @qty_row_counter)
                    td.html model.get('price')
                    td.attr('data-model', model.get('id'))      
            )

        @qty_row_counter++

    onChangePaperSize: (dis) =>
        # get value
        value = dis.target.value
        # find the model where model id is equal to value
        @paperSizesCollection.find (model) =>
            # set condition to get the current model that we need
            if model.get('id') == value
                # set url
                model.urlRoot = '/resource/print/setup-options/setup-paper'
                # enable current selection storing for paper size
                model.set('current_selection_paper_size', 1)
                # show loader
                _h.loader true
                # send request to save current selection for paper size
                model.save [],
                    success: @onRenderChanges
                    error: @error

        # return self
        @

    onChangePaperType: (dis) =>
       # get value
        value = dis.target.value
        # find the model where model id is equal to value
        @paperTypesCollection.find (model) =>
            # set condition to get the current model that we need
            if model.get('id') == value
                # set url
                model.urlRoot = '/resource/print/setup-options/setup-paper'
                # enable current selection storing for paper color
                model.set('current_selection_paper_type', 1)
                # show loader
                _h.loader true
                # send request to save current selection for paper color
                model.save [],
                    success: @onRenderChanges
                    error: @error

        # return self
        @

    onChangePaperColor: (dis) =>
        # get value
        value = dis.target.value
        # find the model where model id is equal to value
        @paperColorsCollection.find (model) =>
            # set condition to get the current model that we need
            if model.get('id') == value
                # set url
                model.urlRoot = '/resource/print/setup-options/setup-paper'
                # enable current selection storing for paper color
                model.set('current_selection_paper_color', 1)
                # show loader
                _h.loader true
                # send request to save current selection for paper color
                model.save [],
                    success: @onRenderChanges
                    error: @error

        # return self
        @

    _renderQuantitiesAndPrices: () =>

        if !!@model.get('quantities_prices')
            # create collection for quantities_prices
            @selectionQuantitiesPrices = new App.Web.Collections.Quantities_Prices()
            # set collection objects
            @selectionQuantitiesPrices.reset(@model.get('quantities_prices'))
            # render table
            @renderQuantityTable()

    _renderPaperSizesOption: () =>
        # set select option
        @paperSizesOption = @$el.find('#paper-size')
        # get paper sizes from model
        sizes = @model.get('sizes')
        # get Collection
        @paperSizesCollection = new App.Web.Collections.Sizes()
        # reset values to become a valid collection of sizes
        @paperSizesCollection.reset(sizes)
        # append blank
        @paperSizesOption.append('<option value="">Select Paper Size</option>')
        # loop each object
        @paperSizesCollection.each @_addOnePaperSize, @
        # return self
        @

    _addOnePaperSize: (model) =>
        # append paper size
        @paperSizesOption.append('<option value="' + model.get('id') + '">' + model.get('dex_en_name') + '</option>')

    _renderPaperTypesOption: () =>
        # set select option
        @paperTypesOption = @$el.find('#paper-type')
        # get paper paper_types from model
        paper_types = @model.get('paper_types')
        # get Collection
        @paperTypesCollection = new App.Web.Collections.PaperTypes()
        # reset values to become a valid collection of sizes
        @paperTypesCollection.reset(paper_types)
        # append blank
        @paperTypesOption.append('<option value="">Select Paper Type</option>')
        # loop each object
        @paperTypesCollection.each @_addOnePaperType, @
        # return self
        @

    _addOnePaperType: (model) =>
        # append paper paper type
        @paperTypesOption.append('<option value="' + model.get('id') + '">' + model.get('en_name') + '</option>')

    _renderPaperColorsOption: () =>
        # set select option
        @paperColorsOption = @$el.find('#paper-color')
        # get paper colors from model
        colors = @model.get('colors')
        # get Collection
        @paperColorsCollection = new App.Web.Collections.Colors();
        # reset values to become a valid collection of sizes
        @paperColorsCollection.reset(colors)
        # append blank
        @paperColorsOption.append('<option value="">Select Paper Type</option>')
        # loop each object
        @paperColorsCollection.each @_addOnePaperColor, @
        # return self
        @

    _addOnePaperColor: (model) =>
        # append paper color
        @paperColorsOption.append('<option value="' + model.get('id') + '">' + model.get('dex_en_name') + '</option>')

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent else responseContent.error
        # show error
        _h.message 'error', error.message
        # reload page if reload response received
        if !!error.reload
            location.reload()