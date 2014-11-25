<div data-target="me-info-email"></div>
<script type="text/template" id="App-Views-EditEmail">
<span data-template-target="info-email">
    <div class="panel panel-default panel2">
        <div class="pb panel-heading2">
            Change Email    
        </div>
        <div class="panel-body  panel-body-2">
            <form method="POST" action="#" accept-charset="UTF-8">
                {{ Form::token() }}
                <div class="form-group 1">
                    <label for="email" class="sr-only">Email address</label>            
                    <input type="email" name="email" class="form-control form-control2" required="required" value="<%= email %>">
                </div>
                <div class="form-group clearfix">
                    <div class="pull-right">
                        <button type="button" href="#" class="btn btn-primary lc update" name="action" value="update-email">Update Email</button>
                        <button type="button" href="#" class="btn btn-primary lc send_verification" name="action" value="send-verification">Send Verification</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</span>
</script>