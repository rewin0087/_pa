# Printing Setup Finishing Category Item list detail View
class App.Web.Views.Printing_Setup_Finishing_Category_Item extends App.Views.Base
    tagName: 'div'
    template: 'App-Views-Finishing-Category-Item'
    className: 'pull-left'

    events: () ->
        {     
            'click .show-finishing-productions' : 'showFinishingProductionModal'
        }

    showFinishingProductionModal: () =>
        # initialize modal
        modal = new App.Web.Views.Printing_Setup_Finishing_Production_Modal({ model: @model })
        # render modal
        modal.render()
        @
