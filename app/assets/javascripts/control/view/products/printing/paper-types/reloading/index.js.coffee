# Product Printing list View
class App.Control.Views.Product_Printing_PaperType_Reloading_Index extends App.Views.Collection
    el: '#product-printing-paper-type-reloading-holder'
    paper_type_id: 0

    events: () ->
        {
            'click #product-printing-finishing-reloading-holder .store' : 'reloadFinishing'
            'click #product-printing-pricing-reloading-holder .store' : 'reloadPricing'
            'click #product-printing-finishing-reloading-holder #finishing-default' : 'reloadFinishingMakeDefault'
            'click #product-printing-pricing-reloading-holder #pricing-default' : 'reloadPricingMakeDefault'
        }

    render: () =>
        _h.log 'init reloading view'
        # short polling
        @updateUi()
        # return self
        @

    reloadFinishingMakeDefault: () =>
        # show loader
        _h.loader true

        _h.log 'reloading finishing make default'
        # initialize reloading model
        model = new App.Control.Models.Products_Printing_PaperType_Reloading()
        # set url
        model.urlRoot = '/resource/products/printing/paper-types/reloading'
        # set params
        model.set('paper_type_id', @paper_type_id)
        model.set('make_default', 1)
        model.set('finishing_default', 1)
        # save
        model.save null
            success: @makeDefaultSuccess
            error: @error

    reloadPricingMakeDefault: () =>
        # show loader
        _h.loader true

        _h.log 'reloading pricing make default'
        # initialize reloading model
        model = new App.Control.Models.Products_Printing_PaperType_Reloading()
        # set url
        model.urlRoot = '/resource/products/printing/paper-types/reloading'
        # set params
        model.set('paper_type_id', @paper_type_id)
        model.set('make_default', 1)
        model.set('pricing_default', 1)
        # save
        model.save null
            success: @makeDefaultSuccess
            error: @error

    makeDefaultSuccess: () =>
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Default set.'

    reloadPricing: () =>
        _h.log 'reloading pricing'
        # initialize reloading model
        model = new App.Control.Models.Products_Printing_PaperType_Reloading()
        # set url
        model.urlRoot = '/resource/products/printing/paper-types/reloading'
        # set params
        model.set('pricing', 1)
        model.set('finishing_default', 0)
        model.set('paper_type_id', @paper_type_id)
        # save
        model.save null
            success: @success
            error: @error

        @

    reloadFinishing: () =>
        _h.log 'reloading finishing'
        # initialize reloading model
        model = new App.Control.Models.Products_Printing_PaperType_Reloading()
        # set url
        model.urlRoot = '/resource/products/printing/paper-types/reloading'
        # set params
        model.set('finishing', 1)
        model.set('pricing', 0)
        model.set('paper_type_id', @paper_type_id)
        # save
        model.save null
            success: @success
            error: @error
        @

    poll: () =>
        
        setTimeout () =>
            @updateUi()
        , 10000

    updateUi: () =>
        paper_type_id = @paper_type_id
        # initialize reloading model
        model = new App.Control.Models.Products_Printing_PaperType_Reloading()
        # set url
        model.urlRoot = '/resource/products/printing/paper-types/reloading?paper_type_id=' + paper_type_id
        # fetch
        model.fetch({  error: @poll }).then () =>
            _h.log model.get('price_list_reloaded')
            _h.log model.get('finishing_list_reloaded')
            _h.log model.get('price_reload_errors')
            _h.log model.get('finishing_reload_errors')

            #
            # PRICING
            #
            
            # pricing loader
            loaderPricingHolder = @$el.find('#pricing-loader')
            loaderPricingHolderTemplate = @$el.find('#pricing-loader-template').html()
            # pricing button
            buttonPricingHolder = @$el.find('#pricing-button')
            buttonPricingHolderTemplate = @$el.find('#pricing-button-template').html()

            # pricing view
            # check if reloaded already
            if parseInt(model.get('price_list_reloaded')) == 2 && !!model.get('file_pricing')
                
                loaderPricingHolder.html loaderPricingHolderTemplate
                @$el.find('#pricing-button').html '<p> Reloaded Already </p> <a href="#" id="pricing-default"><p>Make it default</p></a>'
                loaderPricingHolder.html ''

                # check if theres an error
                if !!model.get('price_reload_errors')
                    @$el.find('#pricing-button').html ''
                    @$el.find('#pricing-button').html model.get('price_reload_errors')
            # check if set to reload
            else if parseInt(model.get('price_list_reloaded')) == 1 && !!model.get('file_pricing')
                
                loaderPricingHolder.html loaderPricingHolderTemplate
                @$el.find('#pricing-button').html ''
            # check if ready to reload
            else if parseInt(model.get('price_list_reloaded')) == 0 && !!model.get('file_pricing')
                loaderPricingHolder.html ''
                buttonPricingHolder.html buttonPricingHolderTemplate

            # check if there's a file to process
            if !!model.get('file_pricing') == false
                @$el.find('#pricing-button').html '<p>Please Upload an Excel Pricing File</p>'

            #
            # FINISHING
            #

            # finishing loader
            loaderFinishingHolder = @$el.find('#finishing-loader')
            loaderFinishingHolderTemplate = @$el.find('#finishing-loader-template').html()
            # finishing button
            buttonFinishingHolder = @$el.find('#finishing-button')
            buttonFinishingHolderTemplate = @$el.find('#finishing-button-template').html()
            
            # finishing view
            # check if reloaded already
            if parseInt(model.get('finishing_list_reloaded')) == 2 && !!model.get('file_finishing')
                
                loaderFinishingHolder.html loaderFinishingHolderTemplate
                @$el.find('#finishing-button').html '<p>Reloaded Already</p><a href="#" id="finishing-default"><p>Make it default</p></a>'
                loaderFinishingHolder.html ''

                # check if theres an error
                if !!model.get('finishing_reload_errors')
                    @$el.find('#finishing-button').html ''
                    @$el.find('#finishing-button').html model.get('finishing_reload_errors')

            # check if set to reload
            else if parseInt(model.get('finishing_list_reloaded')) == 1 && !!model.get('file_finishing')
                
                loaderFinishingHolder.html loaderFinishingHolderTemplate
                @$el.find('#finishing-button').html ''
            # check if ready to reload
            else if parseInt(model.get('finishing_list_reloaded')) == 0 && !!model.get('file_finishing')
                loaderFinishingHolder.html ''
                buttonFinishingHolder.html buttonFinishingHolderTemplate

            # check if there's a file to process
            if !!model.get('file_finishing') == false
                @$el.find('#finishing-button').html '<p>Please Upload an Excel Finishing File</p>'

            # refetch
            @poll()

    success: (res) =>
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully Running the Queue.'
        # update Ui
        @updateUi()
        
        @
    
    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error

        @

