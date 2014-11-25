# Printing Setup Finishing Production Modal View
class App.Web.Views.Printing_Setup_Finishing_Production_Modal extends App.Views.Base
    el: '#finishing-production-modal'

    render: () =>
        
        if !!@model.get('productions') && @model.get('productions').length > 0
            @$el.find('#finishing-production-modal-content').html ''
            # add Item
            _.map @model.get('productions'), @addOne, @
        else
            @$el.find('#finishing-production-modal-content').html '<p class="center">No Finishing Found</p>'

        @$el.find('#finishing-category-title').html @model.get('code_name')
        # return self
        @

    addOne: (object) =>
        # initialize model
        model = new App.Web.Models.Finishing_Production(object)
        # set url
        model.urlRoot = '/resource/print/setup-finishing'
        # initialize item view
        item = new App.Web.Views.Printing_Setup_Finishing_Production_Modal_Item({ model: model })
        item.parent = @model
        # append to modal
        @$el.find('#finishing-production-modal-content').append(item.render().el)
        # return self
        @