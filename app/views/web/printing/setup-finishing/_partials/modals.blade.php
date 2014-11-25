<div class="modal fade" id="finishing-production-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="finishing-category-title"></h4>
            </div>
            <div class="modal-body">
                <!-- row 1 -->
                <div class="row m10 mB5" id="finishing-production-modal-content">
                    <p class="center">No Finishing Found</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Modal Finishing Production Modal Item -->
@include('web.printing.setup-finishing._partials.finishing-production-modal-item')
<!--  Modal GIVEN NAME -->
@include('web.printing.setup-options._partials.given-name-modal')