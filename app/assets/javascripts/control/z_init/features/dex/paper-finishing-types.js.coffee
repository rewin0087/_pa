$(document).ready ()->
    
    if $('body').hasClass('dex-paper-finishing-types-page')
        # on scroll
        $(window).scroll () ->
            # get window height
            winHeight = $(window).scrollTop()
            # get combination html object
            combinationDiv = $('#combination-box')
            # check winHeight to make combinationDiv fixed on screen
            if winHeight > 30
                combinationDiv.addClass('fixed-bottom col-md-3')
            else
                combinationDiv.removeClass('fixed-bottom col-md-3')
       
        # highlight text on hover
        _h.highlightText '.hightlight-text'

       # get paper finishing type model collections
        dexFeaturesPaperFinishingTypeCollection = new App.Control.Collections.Features_Dex_PaperFinishingTypes()
        # show loader
        _h.loader true
        # fetch data
        dexFeaturesPaperFinishingTypeCollection.fetch().then () ->
            _h.log dexFeaturesPaperFinishingTypeCollection
            # get list view
            paperFinishingTypeListVeiw = new App.Control.Views.Features_Dex_PaperFinishingTypes_Main({ collection: dexFeaturesPaperFinishingTypeCollection })
            # render html
            paperFinishingTypeListVeiw.render().el
            # initialize datatables
            $('#paper-finishing-type-holder table').dataTable
                'info' : false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'