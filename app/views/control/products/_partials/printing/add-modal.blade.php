<!-- ADD MODAL -->
<div class="modal fade add-modal" data-backdrop="static" data-keyboard="false" id="App-Views-AddProductPrintingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form enctype="multipart/form-data">
                {{ Form::token() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add</h4>
                </div>
                <div class="modal-body">
                    <!-- sheet divisions-->
                    <div class="form-group">
                        <label>Sheet Divisions</label>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="checkbox bordered-inline">
                                    <input type="checkbox" name="sheet_divisions" class="sheet_divisions" value="50"> 50
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="checkbox bordered-inline">
                                    <input type="checkbox" name="sheet_divisions" class="sheet_divisions" value="100"> 100
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="checkbox bordered-inline">
                                    <input type="checkbox" name="sheet_divisions" class="sheet_divisions" value="250"> 250
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="checkbox bordered-inline">
                                    <input type="checkbox" name="sheet_divisions" class="sheet_divisions" value="500"> 500
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="checkbox bordered-inline">
                                    <input type="checkbox" name="sheet_divisions" class="sheet_divisions" value="1000"> 1000
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- name[en] -->
                            <div class="form-group">
                                <label>Name[en]</label>
                                <input type="text" class="form-control" name="en_name" placeholder="Name[en]">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <!-- name[ar] -->
                            <div class="form-group">
                                <label>Name[ar]</label>
                                <input type="text" class="form-control" name="ar_name" placeholder="Name[ar]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- submission time[en] -->
                            <div class="form-group">
                                <label>Submission time[en]</label>
                                <input type="text" class="form-control" name="en_submission_time" placeholder="Submission time[en]">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <!-- submission time[ar] -->
                            <div class="form-group">
                                <label>Submission time[ar]</label>
                                <input type="text" class="form-control" name="ar_submission_time" placeholder="Submission time[ar]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- shipping date[en] -->
                            <div class="form-group">
                                <label>Shipping date[en]</label>
                                <input type="text" class="form-control" name="en_shipping_date" placeholder="Shipping date[en]">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <!-- shipping date[ar] -->
                            <div class="form-group">
                                <label>Shipping date[ar]</label>
                                <input type="text" class="form-control" name="ar_shipping_date" placeholder="Shipping date[ar]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- description[en] -->
                            <div class="form-group">
                                <label>Description [en]</label>
                                <textarea class="form-control" name="en_description" placeholder="Description[en]"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <!-- description[ar] -->
                            <div class="form-group">
                                <label>Description [ar]</label>
                                <textarea class="form-control" name="ar_description" placeholder="Description[ar]"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- paper type[en] -->
                            <div class="form-group">
                                <label>Paper type[en]</label>
                                <input type="text" class="form-control" name="en_paper_types" placeholder="Paper type[en]">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <!-- paper type[ar] -->
                            <div class="form-group">
                                <label>Paper type[ar]</label>
                                <input type="text" class="form-control" name="ar_paper_types" placeholder="Paper type[ar]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- paper weight[en] -->
                            <div class="form-group">
                                <label>Paper weight[en]</label>
                                <input type="text" class="form-control" name="en_paper_weights" placeholder="Paper weight[en]">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <!-- paper weight[ar] -->
                            <div class="form-group">
                                <label>Paper weight[ar]</label>
                                <input type="text" class="form-control" name="ar_paper_weights" placeholder="Paper weight[ar]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- color option[en] -->
                            <div class="form-group">
                                <label>Color option[en]</label>
                                <input type="text" class="form-control" name="en_color_options" placeholder="Color option[en]">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <!-- color option[ar] -->
                            <div class="form-group">
                                <label>Color option[ar]</label>
                                <input type="text" class="form-control" name="ar_color_options" placeholder="Color option[ar]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- seo url -->
                            <div class="form-group">
                                <label>Seo url</label>
                                <input type="text" class="form-control" name="seo_url" placeholder="Seo url">
                            </div>
                        </div>
                    </div>
                    <div class= "row">
                        <div class="col-xs-3">
                            <!-- Product Image -->
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" class="hide" name="product_image" id="product_image_file">
                                <button type="button" class="btn btn-default file-upload form-control" data-target="product_image_file">Select Image</button>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <!-- Product Hover Image -->
                            <div class="form-group">
                                <label>Product Hover Image</label>
                                <input type="file" class="hide" name="product_hover_image" id="product_hover_image_file">
                                <button type="button" class="btn btn-default file-upload form-control" data-target="product_hover_image_file">Select Image</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary save">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>