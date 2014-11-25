<!-- ADD MODAL -->
<div class="modal fade upload-login-modal" data-backdrop="static" data-keyboard="false" id="App-Views-AddShippingAddressModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md add-shipping-modal-width">
        <div class="login-style-width">
            <div class="modal-header">
                <button type="button" class="close-login close-position" data-dismiss="modal" aria-hidden="true">&times;</button>
                
                <div class = "row">
                    <div class = "col-sm-6">
                        <p class="text-left login-style">LOGIN</p>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-sm-6">
                        <input type="radio" name="login" id="login_exist" value="exist"> EXISTING USER
                    </div>
                </div>
                <!-- EXISTING USER FORM-->
                <div class="existing-user hide-form">
                    <form> 
                        <div class="row">
                            <div class="col-sm-6">
                                <p>EMAIL ADDRESS
                                <!-- EMAIL ADDRESS INPUT -->
                                <input class="form-control form-control-login" placeholder="" name="email" type="text" value="">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>PASSWORD
                                <!-- PASSWORD INPUT -->
                                <input class="form-control form-control-login" placeholder="" name="password" type="password" value="">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 inline">
                                <input class=" mB10 check-box" type="checkbox" name="" value=""><p class="golden">&nbsp;REMEMBER MY ID PASSWORD</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="#" class="brown btn btn-xs login">PROCEED</a>
                            </div>
                        </div>
                    </form>
                </div>          
                <hr>                  
                <div class = "row">
                    <div class = "col-sm-6">
                        <input type="radio" name="login" id="login_new" value="new"> NEW USER
                    </div>
                </div>
                <!-- NEW USER FORM-->
                <div class="new-user hide-form">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>FIRST NAME
                                <!-- FIRST NAME INPUT -->
                                <input class="form-control form-control-login" placeholder="" name="first_name" type="text" value="">
                                </p>
                            </div>
                        </div>
               
                        <div class="row">
                            <div class="col-sm-6">
                                <p>FAMILY NAME
                                <!-- FAMILY NAME INPUT -->
                                <input class="form-control form-control-login" placeholder="" name="last_name" type="text" value="">
                                </p>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-sm-6">
                                <p>EMAIL ADDRESS
                                <!-- EMAIL ADDRESS INPUT -->
                                <input class="form-control form-control-login" placeholder="" name="email" type="text" value="">
                                </p>
                            </div>
                        </div>
                     
                        <div class="row">
                            <div class="col-sm-6">
                                <p>PASSWORD
                                <!-- PASSWORD INPUT -->
                                <input class="form-control form-control-login" placeholder="" name="password" type="password" value="">
                                </p>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <p>RE-ENTER PASSWORD
                                <!-- RE-ENTER PASSWORD INPUT -->
                                <input class="form-control form-control-login" placeholder="" name="confirm_password" type="password" value="">
                                </p>
                            </div>
                        </div>
                  
                        <div class="row">
                            <div class="col-sm-6 inline">
                                <p class="golden"><input class=" mB10 check-box" type="checkbox" name="terms_condition" value="1">&nbsp;I ACCEPT TERMS & CONDITIONS</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="#" class="brown btn btn-xs register">REGISTER AND PROCEED</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>