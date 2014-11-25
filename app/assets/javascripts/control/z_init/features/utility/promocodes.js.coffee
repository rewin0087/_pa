$(document).ready ()->
    
    if $('body').hasClass('utility-promocodes-page')
        # get model collection
        collection = new App.Control.Collections.Features_Utility_Promocodes();
        # show loader
        _h.loader true
        # fetch data
        collection.fetch( { add : true } ).then () ->
            _h.log collection
            # get view collection
            listView = new App.Control.Views.Features_Utility_Promocodes({ collection: collection })
            # render html
            listView.render().el
            # initialize add modal
            addModal = new App.Control.Views.AddUtilityPromocodeModal({ collection: collection })
            # render addModal
            addModal.render()
            # initialize datatables
            $('#utility-promocode-table').dataTable
                'info': false
            # tooltip
             _h.tooltip '._tooltip'
            # hide loader
            _h.loader false


 