<section id="select-options">
    <div class="row">
        <div class="col-xs-3">
            <div id="step-description">
                <div id="cont-a">
                    <h1>Select<br/><strong>Options</strong></h1>
                    <h5>Love Silver? Love Gold?<br/>We have it all ...</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-9">
            <div id="step-content">
                <div class="arr pull-left arr-L"></div>
                <div class="arr pull-right arr-R"></div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- CURRENT SELECTION -->
                        @include('web.printing.setup-options._partials.current-selection')
                    </div>
                    <div class="col-xs-6" id="setup-finishing-holder">
                        <!-- SETUP FINISHING -->
                        @include('web.printing.setup-finishing._partials.setup-finishing')
                        <div class="row">
                            <div id="step-control-prv-nex">
                                <!-- GO BACK -->
                                <div class="col-xs-6">
                                    <a href="/printing/setup-options" class="pull-left">
                                        <i class="icon-left-dir-1"></i>
                                        <div class="brown btn btn-xs">GO BACK</div>
                                        <small>SETUP PRODUCT</small>
                                    </a>
                                </div>
                                <!-- GO NEXT -->
                                <div class="col-xs-6">
                                    <a href="/printing/upload-data" class="pull-right">
                                        <div class="darkbrown btn btn-xs">GO NEXT</div>
                                        <i class="icon-right-dir-1"></i>
                                        <small>UPLOAD DATA</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="order-faqs" >
                    <ul class="text-left ">
                                <span class="of w235px mL5">ORDER FAQS</span>
                                <li><a class="tooltips" href="#">Can I get rush printing on my order?
                                    <span><strong class="red_gly">RUSH PRINTING</strong><br>
                                    What is the estimated arrival date. 
                                    What happens to my delivery if I'm not at home? 
                                    Can I get rush printing on my order. 
                                    <br><strong class="red_gly">REGULAR PRINTING</strong><br>
                                    What is the estimated arrival date that happens to order. And how about the
                                    additonal courier service fees?
                                    </span>
                                    </a>
                                </li>
                                <li><a class="tooltips" href="#">What is the estimated arrival date?
                                    <span><strong class="red_gly">RUSH PRINTING</strong><br>
                                    What is the estimated arrival date. 
                                    What happens to my delivery if I'm not at home? 
                                    Can I get rush printing on my order. 
                                    <br><strong class="red_gly">REGULAR PRINTING</strong><br>
                                    What is the estimated arrival date that happens to order. And how about the
                                    additonal courier service fees?
                                    </span>
                                    </a>
                                </li>
                                <li><a class="tooltips" href="#">What happens to my delivery if I'm not at home?
                                    <span><strong class="red_gly">RUSH PRINTING</strong><br>
                                    What is the estimated arrival date. 
                                    What happens to my delivery if I'm not at home? 
                                    Can I get rush printing on my order. 
                                    <br><strong class="red_gly">REGULAR PRINTING</strong><br>
                                    What is the estimated arrival date that happens to order. And how about the
                                    additonal courier service fees?
                                    </span>
                                    </a>
                                </li>
                                <li><a class="tooltips" href="#">Can I get rush printing on my order?
                                    <span><strong class="red_gly">RUSH PRINTING</strong><br>
                                    What is the estimated arrival date. 
                                    What happens to my delivery if I'm not at home? 
                                    Can I get rush printing on my order. 
                                    <br><strong class="red_gly">REGULAR PRINTING</strong><br>
                                    What is the estimated arrival date that happens to order. And how about the
                                    additonal courier service fees?
                                    </span>
                                    </a>
                                </li>
                       
                    </ul>
                </div>
                <div id="step-control"  class="icon-positioning2">
                    <a href="" id="prev-step" class="icon-color2"><span class="cc-arrow-pos fa fa-chevron-circle-left"></span></a>
                    <a href="" id="next-step" class="icon-color2"><span class="cc-arrow-pos fa fa-chevron-circle-right"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 no_padding">
            <div id="step-content2">
                <div id="order-faqs2" >
                    <ul class="img-list">
                        <li>
                            <div class="borL"></div>
                            <a href="#">
                            <img src="/assets/web/thumb1.png" width="280" height="110"/>
                            <span class="text-content"><span>Place Name</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <img src="/assets/web/thumb2.png" width="280" height="110"/>
                            <span class="text-content"><span>Design Templates</span></span>
                            </a>
                        </li>
                        <li>
                            <div class="borR"></div>
                            <a href="#">
                            <img src="/assets/web/thumb3.png" width="280" height="110"/>
                            <span class="text-content"><span>Data Tutorials</span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modals -->
    @include('web.printing.setup-finishing._partials.modals')
</section>