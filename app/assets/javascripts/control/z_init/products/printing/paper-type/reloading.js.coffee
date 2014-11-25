$(document).ready ()->
    
    if $('body').hasClass('product-printing-paper-type-reloading-page')
        _h.log 'reloading'
        # get Paper type Identity
        paperTypeIdentity = $('#paper-type-identity')
        # paper type id
        paper_type_id = paperTypeIdentity.attr('data-paper-type-id')
        
        # show loader
        _h.loader true
        # get view collection 
        listView = new App.Control.Views.Product_Printing_PaperType_Reloading_Index()
        listView.paper_type_id = paper_type_id
        # render html
        listView.render()
        # hide loader
        _h.loader false


 