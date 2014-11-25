<div data-target="me-info-basic"></div>
<script type="text/template" id="App-Views-EditBasicInfo"> 
    <div class="panel panel-default panel2">
        <div class="pb panel-heading2">
            Basic Information
        </div>
        
        <div class="panel-body panel-body-2">
            <form method="POST" action="#">
            {{ Form::token() }}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-inline">
                            <ul class="list-inline">
                                <li>
                                    <label>Account type</label>
                                </li>
                                <li class="">
                                   <div class="radio"><label><input name="is_primary" id="is_primary" type="radio"value="1" <% if (user_address.is_primary==1){%> checked<%}%>> Home</label></div>&nbsp;&nbsp;
                                    <div class="radio"><label><input name="is_corporate" id="is_corporate" type="radio" value="1" <% if (user_address.is_corporate==1){%> checked<%}%>> Business</label></div>&nbsp;&nbsp;
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group 1">
                            <label for="first_name" class="sr-only">First name</label>
                            <input placeholder="First name" class="form-control form-control2" type="text" name="first_name" value="<%= user_info.first_name %>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group 1">
                            <label for="last_name" class="sr-only">Last name</label>
                            <input placeholder="Last name" class="form-control form-control2" type="text" name="last_name" value="<%= user_info.last_name %>">
                        </div>
                    </div>
                </div>
                                
                <div id="corporate-wrapper" class="collapse row " data-corporate="">
                    <div class="col-xs-12">
                        <div class="form-group 1">
                            <label for="company_name" class="sr-only">Company name</label>
                            <input placeholder="Company name" class="form-control form-control2" type="text" name="company_name" value="<%= user_info.company_name %>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group 1">
                            <label for="mobile_number" class="sr-only">Mobile number</label>
                            <input placeholder="Mobile number" class="form-control form-control2" type="text" name="mobile_number" id="mobile_number" value="<%= user_address.mobile_number %>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group 1">
                            <label for="telephone_number" class="sr-only">Landline number</label>
                            <input placeholder="Landline number" class="form-control form-control2" type="text" name="telephone_number" id="telephone_number" value="<%= user_address.telephone_number %>">
                        </div>
                    </div>
                </div>
                                    
                <label>Address</label>
                
                <div class="row form-group 1 1">
                    <div class="col-xs-12">
                        <select class="form-control" id="country" name="country">
                            <option value="">Country</option>
                            <option value="United Arab Emirates" <%= user_address.country=='United Arab Emirates' ? 'selected' : '' %>>United Arab Emirates</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group 1 1">
                    <div class="col-xs-6">
                        <select class="form-control" id="city" name="city">
                            <option value="">City</option>
                            <option value="Dubai" <%= user_address.city=='Dubai' ? 'selected' : '' %>>Dubai</option>
                            <option value="Abu Dhabi" <%= user_address.city=='Abu Dhabi' ? 'selected' : '' %>>Abu Dhabi</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <select class="form-control" id="area" name="area">
                            <option value="">Area</option>
                            <option value="Al Badaa" <%= user_address.area=='Al Badaa' ? 'selected' : '' %>>Al Badaa</option>
                            <option value="Abu Hail" <%= user_address.area=='Abu Hail' ? 'selected' : '' %>>Abu Hail</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group 1 1">
                    <div class="col-xs-6">
                        <input placeholder="Street Name/No." class="form-control form-control2" type="text" name="street" value="<%= user_address.street %>">
                    </div>
                    <div class="col-xs-6">
                        <input placeholder="Building name/No." class="form-control form-control2" type="text" name="building_name" value="<%= user_address.building_name %>">
                    </div>
                </div>

                <div class="row form-group 1 1">
                    <div class="col-xs-6">
                        <input placeholder="Floor No." class="form-control form-control2" type="text" name="floor" value="<%= user_address.floor %>">
                    </div>
                    <div class="col-xs-6">
                        <input placeholder="Apartment No." class="form-control form-control2" type="text" name="apartment" value="<%= user_address.apartment %>">
                    </div>
                </div>

                <div class="form-inline">
                    <div class="radio">
                        <label>
                            <input type="checkbox" name="display_shipping_origin" value="1"> Include in Shipping Origin list?                    
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <span class="help-block">
                            If selected, your home address will appear on your list of Shipping Origins More about your shipping address <a href="#">here</a>
                        </span>
                    </div>
                    <div class="col-xs-3">
                        <button type="button" class="btn btn-primary lc update">Update</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</script>