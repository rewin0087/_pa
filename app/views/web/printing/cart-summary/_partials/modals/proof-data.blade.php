<!-- PROOF DATA MODAL -->
<div data-target-template="proof-data-item-modal"></div>
<script type="text/template" id="App-Views-Cart-Summary-Proof-Data-Item-Modal">
<div class="modal fade" id="proofDataModal" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload Proof Data</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" class="mT20">
                    {{ Form::token() }}
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Proof Data File -->
                            <div class="form-group">
                                <div class="cart-uploader">
                                    <div class="cart-dropzone-holder" id="proof-file-dropzone">
                                        <p>Drop files here</p>
                                    </div>
                                    <p class="cart-or"> -- or -- </p>
                                    <div class="cart-browse-button">
                                        <input type="file" class="hide" accept="image/*" name="proof_data" id="proof_data_file">
                                        <button type="button" class="btn brown file-upload form-control" data-target="proof_data_file">Browse File</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="darkbrown btn btn-xs font18px" data-dismiss="modal">Close</div>
            </div>
        </div>
    </div>
</div>
</script>