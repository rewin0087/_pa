# Dex Paper Finishing Types Option list View
class App.Control.Views.Features_Dex_PaperFinishingTypes_Option extends App.Views.Collection
    counter: 0
    template: 'App-Views-PaperFinishingTypeOption'

    render: () =>
        # get template
        template = $('#'+ @template).html();
        # compile the template with underscore
        compiled = _.template(template)
        # set the template into the view and pass the parent model
        @$el.html( compiled( @model.toJSON() ) )
        # loop each model and render the data from the collection of the current model
        _.map @collection, @addOne, @
        # initialize datatable
        @$el.find('table').dataTable
            'info' : false
            'iDisplayLength': 10
        # return self
        @

    addOne: (object) =>
        # counter
        @counter++
        # initialize Features_Dex_PaperFinishingType model
        model = new App.Control.Models.Features_PaperFinishingType(object)
        # set the current position of the model
        model.set('position', @counter)
        # render list detail now for Dex_PaperFinishingType_Option
        paperFinishingTypeOptionView = new App.Control.Views.Features_Dex_PaperFinishingType_Option( { model: model } )
        # set parent model data
        paperFinishingTypeOptionView.parent = @model
        # append new row data
        @$el.find('tbody').append(paperFinishingTypeOptionView.render().el)
        # return self
        @