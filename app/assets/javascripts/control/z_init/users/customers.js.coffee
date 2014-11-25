$(document).ready ()->
    
    if $('body').hasClass('customer-page')
        # get customer model collection
        customersCollection = new App.Control.Collections.Users_Customers();
        # show loader
        _h.loader true
        # fetch data
        customersCollection.fetch( { add : true } ).then () ->
            # get view customer collection
            customersListView = new App.Control.Views.Users_Customers({ collection: customersCollection })
            # render html
            customersListView.render().el
            # initialize customer add modal
            customerAdd = new App.Control.Views.Users_AddCustomerModal({ collection: customersCollection })
            # initialize datatables for customer
            $('#customers-table').dataTable
                'info': false
                'iDisplayLength': 20
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'


 