<section id="select-options">
    <h1 class="mT10">Upload <strong>Data</strong></h1>
    <div class="row">
        <!-- DATA UPLOADER -->
        <div class="data-uploader">
            @include('web.printing.upload-data._partials.data-uploader')
        </div> 
    </div>
    <!-- USER LOGIN -->
    <div class="user-login">
        @include('web.printing.upload-data._partials.user-login') 
    </div>
    <div class="row">
        <div class="row">
            <div class="a-link clearfix">
                <!-- GO BACK -->
                <a href="/printing/setup-finishing" class="pull-left text-left">
                    <div>
                        <i class="icon-left-dir-1"></i>
                        <div class="brown btn btn-xs">GO BACK</div>
                    </div>
                    <small>SETUP FINISHING</small>
                </a>
                <!-- GO NEXT -->
                <a href="#" id="go-cart-summary" class="pull-right text-right">
                    <div>
                        <div class="darkbrown btn btn-xs">GO NEXT</div>
                        <i class="icon-right-dir-1"></i>
                    </div>
                    <small>CART SUMMARY</small>
                </a>
            </div>
        </div>
    </div>
</section>