# Printing Setup Finishing Production Modal View
class App.Web.Views.Printing_Setup_Finishing_Production_Modal_Item extends App.Views.Base
    template: 'App-Views-Finishing-Production-Modal-Item'
    parent: null
    checked: 'glyphicon glyphicon-record'
    uncheck: 'fa-circle-o fa'
    originalModelId: null
    total_finishing_price: 0
    total_finishing_tat: 0

    events: () ->
        {     
            'click .finishing-item' : 'selectFinishingItem'
        }

    selectFinishingItem: () =>
        # find item
        item = @$el.find('.finishing-item')
        # add class on item
        setTimeout () ->
            item.addClass('checked')
        , 300

        # remove productions
        @parent.unset('productions')
        # set parent -> finishing category
        @model.set('parent', @parent)
        # set flag for finishing
        @model.set('current_selection_finishing', 1)
        # set origin model
        @originalModelId = @model.get('id')
        # show loader
        _h.loader true
        # save model
        @model.save [],
            success: @success
            error: @error

        @

    success: (model) =>
        # hide modal
        $('#finishing-production-modal').modal('hide')
        # hide loader
        _h.loader false
        $('.finishing-final-holder').html ''
        # checked selected
        setTimeout () =>
            _.map model.get('finishing'), (object) =>
                # initialize model
                finishing = new App.Web.Models.Printing_Setup_Finishing(object)
                # check selected category
                $('#finishing-category-' + finishing.get('parent').id).removeClass(@uncheck).addClass(@checked)
                # initialize finishing final item      
                finishingFinalItem = new App.Web.Views.Printing_Setup_Finishing_Final_Item({ model: finishing })
                # 
                $('.finishing-final-holder').append(finishingFinalItem.render().el)
                # add finishing price
                @total_finishing_price += parseFloat(finishing.get('pricing').price)
                # add finishing tat
                @total_finishing_tat += parseInt(finishing.get('pricing').turn_around)
                #
                @

            # add finishing and printing price
            sub_total = _h.currency_format( @total_finishing_price + parseFloat(model.get('quantity_price').price) )
            # add finishing and printing tat
            tat_total = @total_finishing_tat + parseInt(model.get('quantity_price').tat)
            # render sub total
            $('#total-price-selected').html 'AED ' + sub_total
            # render total tat
            $('#estimated-tat-selected strong').html tat_total
        , 300
        # initialize collection
        finishingProduction = new App.Web.Collections.Printing_Setup_Finishings()
        # get finishing and reset and put to collection
        finishingProduction.reset(model.get('finishing'))
        # get current selected model and change the model to finishing
        @model = new App.Web.Models.Finishing_Production(finishingProduction.get(@originalModelId).toJSON())
        @model.urlRoot = '/resource/print/setup-finishing/'
        # unset parent and selection tag
        @model.unset('parent')
        @model.unset('pricing')
        @model.unset('current_selection_finishing')

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