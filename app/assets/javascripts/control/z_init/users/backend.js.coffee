$(document).ready ()->
    
    if $('body').hasClass('backend-page')
        # get backend model collection
        backendsCollection = new App.Control.Collections.Users_Backends();
        # show loader
        _h.loader true
        # fetch data
        backendsCollection.fetch( { add : true } ).then () ->
            # get view backend collection 
            backendsListView = new App.Control.Views.Users_Backends({ collection: backendsCollection })
            # render html
            backendsListView.render().el
            # initialize backend add modal
            backendAdd = new App.Control.Views.Users_AddBackendModal({ collection: backendsCollection })
            # initialize datatables for backend
            $('#backend-table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'


 