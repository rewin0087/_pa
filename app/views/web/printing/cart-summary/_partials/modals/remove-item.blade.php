
<!-- REMOVE MODAL -->
<div data-target-template="remove-item-modal"></div>
<script type="text/template" id="App-Views-Cart-Summary-Remove-Item-Modal">
<div class="modal fade" id="rmvModal" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content modal-md cart-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Remove Order Item</h4>
            </div>
            <div class="padding10px">
                <div class="modal-body cart-modal-body">
                    <p>Are you sure you want to remove it? </p>
                </div>
                <div class="cart-modal-footer">
                    <div class="darkbrown btn btn-xs font18px" data-dismiss="modal">Close</div>
                    <div class="brown btn btn-xs font18px remove-item-now">Yes<i class="icon-right-dir-1"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
</script>