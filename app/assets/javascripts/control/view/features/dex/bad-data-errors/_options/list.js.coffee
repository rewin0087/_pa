# Dex Bad Data Error Option list View
class App.Control.Views.Features_Dex_BadDataErrors_Option extends App.Views.Collection
    counter: 0
    template: 'App-Views-BadDataErrorOption'

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
            'paging' : false
        # return self
        @

    addOne: (object) =>
        # counter
        @counter++
        # initialize Features_Dex_BadDataError model
        model = new App.Control.Models.Features_BadDataError(object)
        # set the current position of the model
        model.set('position', @counter)
        # render list detail now for Features_Dex_BadDataError_Option
        badDataErrorOptionView = new App.Control.Views.Features_Dex_BadDataError_Option( { model: model } )
        # append new row data
        @$el.find('tbody').append(badDataErrorOptionView.render().el)
        # return self
        @