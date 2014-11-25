# Features Utility Promocode View list detail
class App.Control.Views.Features_Utility_Promocode extends App.Views.Base
    tagName: 'tr'
    template: 'App-Views-UtilityPromocodeDetail'

    initialize: () =>
        @model.on 'change', @render, @
        @model.on 'destroy', @unRender, @

    events: () ->
        {        
            'click #enable' : 'enable'
            'click #disable' : 'disable'
        }

    enable: () =>
        # show loader
        _h.loader true
        # set enabled to 1
        @model.set('enabled', 1)
        # save
        @model.save [],
            success: @success
            error: @error
        # return self
        @

    disable: () =>
        # show loader
        _h.loader true
        # set enabled to 1
        @model.set('enabled', 0)
        # save
        @model.save [],
            success: @success
            error: @error
        # return self
        @

    success: () =>
        # hide loader
        _h.loader false
        # show notification message
        _h.message 'success', 'Successfully saved new record.'
        # rerender
        @render

    error: (model, response) ->
        # hide loader
        _h.loader false
        # get error from sentry
        responseContent = response.responseJSON
        error = if !!responseContent.message then responseContent.message else responseContent.error.message
        # show error
        _h.message 'error', error