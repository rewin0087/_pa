<div id="paper-type-identity" data-paper-type-id="{{ $paper_type_id }}" data-paper-type-en-name="{{ $en_name }}"></div>
<div class="row" id="product-printing-paper-type-reloading-holder">
    <div class="col-md-12">
        <div class="callout callout-info">
            <h4>Paper type: {{ $en_name }}</h4>
        </div>
    </div>
    <!-- FINISHING FILE -->
    <div class="col-md-6">
        @include('control.products.printing.paper-type._partials.finishing.index')
    </div>
    <!-- PRICING FILE -->
    <div class="col-md-6">
        @include('control.products.printing.paper-type._partials.pricing.index')
    </div>
</div>