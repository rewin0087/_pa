<!-- FROM PC -->
<div class="panel-box">
    <div class="box-upload brown" id="from-pc">
        <div class="clickable">
            <div class="box-image">
                <img src="/assets/web/from-pc.png" alt="FROM PC">
            </div>
            <div class="box-title">
                <p>FROM PC</p>
            </div>
        </div>
        <div class="box-content">
            <div class="dropzone-holder" id="print-file-dropzone">
                <h4>PRINT FILE</h4>
                <div class="upload-target">
                    <input type="file" class="hidden" id="print_file">
                    <a href="#" data-target="print_file" class="file_upload">
                        <div>
                            <p>Drag n' Drop</p>
                            <small>-- or --</small>
                            <p>Browse</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="dropzone-holder" id="proof-file-dropzone">
                <h4>PROOF FILE</h4>
                <div class="upload-target">
                    <input type="file" class="hidden" id="proof_file">
                    <a href="#" data-target="proof_file" class="file_upload">
                        <div>
                            <p>Drag n' Drop</p>
                            <small>-- or --</small>
                            <p>Browse</p>
                        </div>
                    </a>
                </div>
            </div>
            <p>
                <a href="#" class="data-note">
                    <span class="glyphicon glyphicon-plus-sign plus-icon"></span>
                    <span>NOTE TO YOUR DATA</span>
                </a>
            </p>
        </div>
    </div>
</div>

<!-- FROM CLOUD -->
<div class="panel-box">
    <div class="box-upload" id="from-cloud">
        <div class="clickable brown">
            <div class="box-image">
                <img src="/assets/web/from-cloud.png" alt="FROM PC">
            </div>
            <div class="box-title">
                <p>FROM CLOUD</p>
            </div>
        </div>
        <div class="box-content">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Print Data</th>
                        <th>Proof Data</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">
                            <p class="center">No Record Found</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
</div>

<!-- ASK US TO DESIGN -->
<div class="panel-box">
    <div class="box-upload brown" id="ask-us-to-design">
        <div class="clickable">
            <div class="box-image">
                <img src="/assets/web/ask-us-design.png" alt="FROM PC">
            </div>
            <div class="box-title">
                <p>ASK US TO DESIGN</p>
            </div>
        </div>
        <div class="box-content">
            <div class="dropzone-holder">
                <div class="upload-target">
                    <a href="#">
                        <div>
                            <p>Select Design</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="mT10 mB10 or"> 
                <small>-- or --</small>
            </div>
            <div class="dropzone-holder mB20">
                <div class="upload-target">
                    <a href="#">
                        <div>
                            <p>Ask Designer</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PROGRESSBAR MODAL -->
<div class="modal fade" id="file-upload-progressbar" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="file-name"></h4>
            </div>
            <div class="modal-body">
                <!-- row 1 -->
                <div class="row m10 mB5">
                    <div class="progress-holder">
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        </div>
                        <p class="center" id="progress_status"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ADD NOTE -->
@include('web.printing.upload-data._partials.data-note') 