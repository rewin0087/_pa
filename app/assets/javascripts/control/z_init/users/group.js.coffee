$(document).ready ()->
    
    if $('body').hasClass('group-page')
        # get group model collection
        groupCollection = new App.Control.Collections.Group();
        # show loader
        _h.loader true
        # fetch data
        groupCollection.fetch( { add : true } ).then () ->
            _h.log groupCollection
            # get view group collection
            groupListView = new App.Control.Views.Groups({ collection: groupCollection })
            # render html
            groupListView.render().el
            # initialize group add modal
            groupAdd = new App.Control.Views.AddGroupModal({ collection: groupCollection })
            # initialize datatables for group
            $('#group-table').dataTable
                'info': false
                'paging': false
            # hide loader
            _h.loader false
            # initialize tooltip
            _h.tooltip '._tooltip'


 