class window.App.Helper
    isDebug: true
    # console log
    #
    # e.g _h.log 'console log'
    #
    log: (msg)->
        console.log msg if @isDebug

    # templating for backbone view 
    #
    # e.g _h.template 'template'
    #
    template: (id)->
        template = $('#'+ id).html()
        _.template(template)

    # ajax message popup
    #
    # e.g _h.message 'success', 'message'
    #
    message: (type, message)->
        # get DOM
        notificationDiv = $('div.notification-message')
        notificationMessage = $('p', notificationDiv)
        # set type
        if type == 'error'
            notificationDiv.addClass('notification-error')
        else
            notificationDiv.removeClass('notification-error')
        # set Message
        notificationMessage.html message
        # show Notification message
        notificationDiv.fadeIn()
        # remove notification after 3secs
        setTimeout () ->
            notificationDiv.fadeOut()
        , 3000
        # remove message
        setTimeout () ->
            notificationMessage.html ''
        , 3300

    # ajax loader
    #
    # e.g to show: _h.loader true
    # e.g to hide: _j.laoder false
    loader: (show) ->
        if show == true
            $('.ui-loader').fadeIn();
        else if show == false
            $('.ui-loader').fadeOut();

    # highlight text in text field
    #
    # e.g _h.highlightText '.highlight'
    #
    highlightText: (selector) ->
        $(selector).on('click', () ->
            @.select()
        )

    # tooltip
    #
    # e.g _h.tooltip '.tooltip'
    #
    tooltip: (selector) ->
        $(selector).tooltip()

    #
    # Form Serializer
    #
    # e.g _h.serializeForm form
    #
    serializeForm: (form) ->
        # declare empty object
        data = {}
        # serialize form
        formData = form.serializeArray() 
        # extract data from each object and push to data object
        $.each(formData, () -> 
            if (data[this.name])
                if (!data[this.name].push)
                    data[this.name] = [data[this.name]]
                
                data[this.name].push(this.value || '')
            else
                data[this.name] = this.value || ''
        )
        # return serialize data
        data
    #
    # Open Upload File
    #
    # e.g _h.getFileToUpload selector
    #
    getFileToUpload: (selector) ->
        $(selector).click( () ->
            button = $(@);
            target = button.attr('data-target')
            nameInput = button.attr('data-input-name')
            $('#' + target).click()
    
        )

    #
    # File upload removeButton
    #
    # e.g _h.fileRemoveInputButton selector
    #
    fileRemoveInputButton: (selector) =>
        $('html').on('click', selector, () ->
            dis = $(@)
            target = dis.attr('data-target')
            inputName = dis.attr('data-input-name')
            $('#' + target).val('')
            $('#' + inputName).val('')
            dis.hide()
            _h.log 'test'
        )

    #
    # Get File name put it in a text box
    #
    # e.g _h.getFileNameToInputField
    #
    getFileNameToInputField: (selector, h) =>
        $('html').on('change', selector, () ->
            dis = $(@)
            target = dis.attr('data-input-name')
            inputRemove = dis.attr('data-input-remove')
            fullPath = dis.val()
            
            if (fullPath)
                startIndex = if fullPath.indexOf('\\') >= 0 then fullPath.lastIndexOf('\\') else fullPath.lastIndexOf('/')
                filename = fullPath.substring(startIndex)
                if (filename.indexOf('\\') == 0 || filename.indexOf('/') == 0) 
                    filename = filename.substring(1)
                    # put file name to input
                    $('#' + target).val(filename)
                    _h.log filename
                    # show remove button
                    $('#' + inputRemove).show();
                    # call file remove input button
                    h.fileRemoveInputButton('#' + inputRemove)
        )

    #
    # Time picker
    #
    # e.g _h.timepicker selector
    #
    timepicker: (selector, data, target) ->
        $(selector).bfhtimepicker(data)

    #
    # Time Mask
    #
    # e.g _h.timeMasking selector
    #
    timeMasking: (selector) ->
        $(selector).mask('99:99')

    #
    # Time Mask
    #
    # e.g _h.timeRangeMasking selector
    #
    timeRangeMasking: (selector) ->
        $(selector).mask('99:99~99:99')

    #
    # chosen with search
    #
    # e.g _h.chosenWithSearch selector
    #
    chosenWithSearch: (selector) ->
        $(selector).chosen({ width: "100%"})

    #
    # chosen
    #
    # e.g _h.chosen selector
    #
    chosen: (selector) ->
        $(selector).chosen({ disable_search_threshold: 100, width: "100%"})

    #
    # Select picker
    #
    # e.g _h.chosen selector
    #
    selectPicker: (selector) ->
        $(selector).selectpicker()

    #
    # Date picker
    #
    # e.g _h.datePicker selector
    #
    datePicker: (selector) ->
        $(selector).datepicker(
        )

    #
    # NUMBER FORMAT
    #
    # e.g _h.curreny_format n
    #
    currency_format: (n) ->
        
        n.toFixed(2).replace(/./g, (c, i, a) =>
            return if i && c != "." && !((a.length - i) % 3) then ',' + c else c
        )

        
# initialize backbone events
window._v = _.extend( {}, Backbone.Events)
Backbone.history.start();
# initialize App.Helper 
window._h = new window.App.Helper();

#
# BASE VIEW 
#
#
class App.Views.Base extends Backbone.View

    render: () =>
        template = _h.template(@template)
        @$el.html template( @model.toJSON() )
        @

#
# BASE COLLECTION VIEW
#
#
class App.Views.Collection extends Backbone.View
    render: () =>
        template = $('#'+ @template).html();
        compiled = _.template(template)
        @setElement(compiled(@data))
        @
#
# BASE MODEL
#
#
class App.Models.Base extends Backbone.Model
    urlRoot: null

#
# BASE COLLECTION
#
#
class App.Collections.Base extends Backbone.Collection
    urlRoot: null