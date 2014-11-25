<div id="proces-page">
        <div id="back-bgcolor">&nbsp;</div>
        <div class="container body-margin-relative">
            <!-- Tab -->
            @include('web.printing.cart-summary._partials.tab')
            <!--Cart Summary Content-->
            @include('web.printing.cart-summary._partials.content')
        </div>
    </div><!-- #process-page -->
</div><!-- #main-wrapper -->

<!-- DUPLICATE MODAL -->
@include('web.printing.cart-summary._partials.modals.duplicate-item')

<!-- REMOVE MODAL -->
@include('web.printing.cart-summary._partials.modals.remove-item')

<!-- PRINT DATA MODAL -->
@include('web.printing.cart-summary._partials.modals.print-data')

<!-- PROOF DATA MODAL -->
@include('web.printing.cart-summary._partials.modals.proof-data')

<!-- GIVEN NAME MODAL -->
@include('web.printing.setup-options._partials.given-name-modal')

<!-- PROGRESS MODAL -->
@include('web.printing.cart-summary._partials.modals.progress-modal')

<!-- ADD NOTE -->
@include('web.printing.upload-data._partials.data-note')