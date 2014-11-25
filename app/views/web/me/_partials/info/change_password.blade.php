<div data-target="me-info-password"></div>
<script type="text/template" id="App-Views-EditPassword">
<span data-template-target="info-password">
    <div class="panel panel-default panel2">
        <div class="pb panel-heading2">
            Change Password    
        </div>
        
        <div class="panel-body  panel-body-2">
            <form method="POST" action="#" accept-charset="UTF-8">
                {{ Form::token() }}        
                <div class="form-group 1">
                    <label for="current_password" class="sr-only">Current password</label>
                        <input placeholder="Current password" class="form-control form-control2" required="required" id="current_password" name="current_password" type="password" value="">                    
                </div>
                
                <div class="form-group">
                    <label for="new_password" class="sr-only">Current password</label>
                    <input placeholder="New password" class="form-control form-control2" required="required" id="new_password" name="new_password" type="password" value="">
                </div>
                
                <div class="form-group">
                    <label for="confirm_password" class="sr-only">Confirm password</label>
                    <input placeholder="Confirm password" class="form-control form-control2" required="required" id="confirm_password" name="confirm_password" type="password" value="">        
                </div>
                
                <div class="form-group clearfix">
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary lc update">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</span>
</script>