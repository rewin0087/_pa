<section id="select-product">
    <div class="row">
        <div class="col-xs-3">
            <div id="step-description">
                <div id="cont-a">
                    <h1>Select<br/><strong>Product</strong></h1>
                    <h5>OVER 250 PRODUCTS<br/>TO CHOOSE</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-9">
            <div class="carousel slide" id="select-product-slider">
                <div id="product-list">
                    <div class="row">
                        <div class="carousel-inner" id="product-holder">
                            <!-- PUT Batch 1 PRODUCT ITEMS HERE -->
                        </div>
                    </div>
                </div>
                <div id="coursel-control" class="icon-spacing clearfix">
                    <div class="pull-right icon-positioning">
                        <a href="#select-product-slider" data-slide="next" class="icon-color">
                        <span class="cc-arrow-pos  fa fa-chevron-circle-right"></span>
                        </a>
                    </div>
                    <div class="pull-left icon-positioning">
                        <a href="#select-product-slider" data-slide="prev" class="icon-color">
                        <span class="cc-arrow-pos  fa fa-chevron-circle-left"></span>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
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
                            <div id="horizontal-line2"></div>
                            <a href="#">
                            <img src="/assets/web/thumb2.png" width="280" height="110"/>
                            <span class="text-content"><span>Design Templates</span></span>
                            </a>
                        </li>
                        <li>
                            <div id="horizontal-line2"></div>
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
</section>
<!-- LIST PRODUCT ITEM -->
@include('web.printing.select-product._partials.product-item')