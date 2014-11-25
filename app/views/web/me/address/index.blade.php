<div class="container">
    <div class="row">
        <div class="col-xs-12">
             @if($errors->has('profile'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ $errors->first('profile', ':message') }}
                </div>
            @endif
            <div class="panel panel-default panel-margin-top">
                <div class="panel-body jumbocolor">
                    <div class = "row">
                        @include('web.me._partials.top-row-avatar')
                        @include('web.me._partials.top-row-storage')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
           @include('web.me._partials.me_navigation_tab')
            <br/>
            <!--0 Tab panes -->
            <div class="tab-content tc">
                <!--put content here -->
                <div class="tab-pane active" id="addresses">
                    <div class="row">
                        <div class="col-xs-4">
                            <ul class="nav nav-tabs nt2">
                                <!-- <li id='sender_address' class="active"><a href="#sa" data-toggle="tab">Sender Addresses</a></li> -->
                                <li id='shipping_addresses' class="active"><a href="#sha" data-toggle="tab">Shipping Addresses</a></li>
                            </ul>
                            <br/>
                            <div class="tab-content tc">
                                <!-- <div class="tab-pane active jm" id="sa">
                                    <table class="table table-bordered table-hover mTop-20" id="sender-addresses-table">
                                        <thead class="theadcolor">
                                            <tr>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    Representative
                                                </th>
                                                <th>
                                                    Company Name
                                                </th>
                                                <th>
                                                    Address
                                                </th>
                                                <th>
                                                    Telephone
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary lc pull-right" data-toggle="modal" data-target=".add-modal-sender">ADD SENDER ADDRESS</button>   
                                </div> -->
                                <div class="tab-pane active jm" id="sha">
                                    <table class="table table-bordered table-hover mTop-20" id="shipping-addresses-table">
                                        <thead class="theadcolor">
                                            <tr>
                                                <th width="12%">
                                                    Type
                                                </th>
                                                <th width="auto">
                                                    Name
                                                </th>
                                                <!-- <th>
                                                    Company Name
                                                </th> -->
                                                <th width="auto">
                                                    Address
                                                </th>
                                                <th width="15%">
                                                    Mobile Number
                                                </th>
                                                <th width="10%">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Render the collection here -->
                                        </tbody>
                                    </table>  
                                     <button type="button" class="btn btn-primary lc pull-right" data-toggle="modal" data-target=".add-modal-shipping">ADD SHIPPING ADDRESS</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / -->
            </div>
        </div>
    </div>
</div>

<!-- TARGET HTML OF EDIT ADDRESS MODAL -->
<div data-target-template="App-Views-EditAddressModal-Target"></div>
<!-- TARGET HTML OF REMOVE ADDRESS MODAL -->
<div data-target-template="App-Views-DeleteAddressModal-Target"></div>
<!-- TARGET HTML OF EDIT SENDER ADDRESS MODAL -->
<div data-target-template="App-Views-EditSenderAddressModal-Target"></div>
<!-- TARGET HTML OF REMOVE SENDER MODAL -->
<div data-target-template="App-Views-DeleteSenderAddressModal-Target"></div>
<!-- TARGET HTML OF EDIT SHIPPING ADDRESS MODAL -->
<div data-target-template="App-Views-EditShippingAddressModal-Target"></div>
<!-- TARGET HTML OF REMOVE SHIPPING ADDRESS MODAL -->
<div data-target-template="App-Views-DeleteShippingAddressModal-Target"></div>

<!-- INCLUDES FOR ADDRESS -->
@include('web.me._partials.addresses.list-detail')
@include('web.me._partials.addresses.add-modal')
@include('web.me._partials.addresses.edit-modal')
@include('web.me._partials.addresses.delete-modal')

<!-- INCLUDES FOR SENDER ADDRESS -->
@include('web.me._partials.sender-addresses.list-detail')
@include('web.me._partials.sender-addresses.add-modal')
@include('web.me._partials.sender-addresses.edit-modal')
@include('web.me._partials.sender-addresses.delete-modal')

<!-- INCLUDES FOR SHIPPING ADDRESS -->
@include('web.me._partials.shipping-addresses.list-detail')
@include('web.me._partials.shipping-addresses.add-modal')
@include('web.me._partials.shipping-addresses.edit-modal')
@include('web.me._partials.shipping-addresses.delete-modal')