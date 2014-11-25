# Cart Item Model
class App.Web.Models.Cart_Item extends App.Models.Base
        printing_tat: 0
        printing_price: 0
        finishing_tat: 0
        finishing_price: 0
        working_month: null
        working_day: null
        total_working_days: 0
        total_price: 0
        printing_price: 0
        finishing_price: 0
        
        computePriceAndEstimatedDate: () =>
            #
            # QUANTITY AND PRICE
            #
            if !!@get('item').quantity_price
                quantity_price = @get('item').quantity_price

                @printing_price = parseFloat(quantity_price.price)
                @printing_tat = parseInt(quantity_price.tat)

            #
            # FINISHINGS
            #
            if !!@get('item').finishing
                finishes = @get('item').finishing

                _.map finishes, @computeFinishingTatAndPrice, @

            total_working_days = @printing_tat + @finishing_tat
            total_price = @printing_price + @finishing_price

            #
            # WORKING DATE MONTH
            #
            dateTime = new Date(@get('item').date)
            # add current date and total working days of the cart item
            dateTime.setDate(dateTime.getDate() + total_working_days)
            # set Working Month
            @set('working_month', @getMonth(dateTime.getMonth()) )
            # set Working Day
            @set('working_day', dateTime.getDate())
            # set total working days
            @set('total_working_days', total_working_days)
            # set total price
            @set('total_price', total_price)
            # set printing_price
            @set('printing_price', @printing_price)
            # set finishing_price
            @set('finishing_price', @finishing_price)
            # return self
            @

        getMonth: (selected_month) =>
            months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];

            months[selected_month]

        computeFinishingTatAndPrice: (finishing) =>
            # add price
            @finishing_price += parseFloat(finishing.pricing.price)
            # add tat
            @finishing_tat += parseInt(finishing.pricing.turn_around)
            # return self
            @