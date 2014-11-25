$(document).ready ()->

    if $('body').hasClass('final-summary-page')
        # get collection
        collection = new App.Web.Collections.Cart()
        collection.url = '/resource/print/final-summary'
        # fetch collection data
        collection.fetch().then () ->
            # get ListView
            listView = new App.Web.Views.Printing_Final_Summary_Index({ collection: collection })
            # render
            listView.render().el