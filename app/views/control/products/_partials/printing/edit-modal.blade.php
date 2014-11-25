<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-EditProductPrintingModal">
    <div class="modal fade edit-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form enctype="multipart/form-data">
            {{ Form::token() }}
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Edit - <%= en_name %></h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="_method" value="PUT" />
              <input type="hidden" name="id" value="<%= id %>" />
              <input type="hidden" name="file_upload_id" value="<%= file_upload_id %>" />
              <input type="hidden" name="file_upload_hover_id" value="<%= file_upload_hover_id %>" />
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
                          <input type="text" class="form-control" name="en_name" placeholder="Name[en]" value="<%= en_name %>">
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <!-- name[ar] -->
                      <div class="form-group">
                          <label>Name[ar]</label>
                          <input type="text" class="form-control" name="ar_name" placeholder="Name[ar]" value="<%= ar_name %>">
                      </div>
                  </div>
              </div>
              <div class="row">
                    <div class="col-xs-6">
                        <!-- submission time[en] -->
                        <div class="form-group">
                            <label>Submission time[en]</label>
                            <input type="text" class="form-control" name="en_submission_time" placeholder="Submission time[en]" value="<%= en_submission_time %>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <!-- submission time[ar] -->
                        <div class="form-group">
                            <label>Submission time[ar]</label>
                            <input type="text" class="form-control" name="ar_submission_time" placeholder="Submission time[ar]" value="<%= ar_submission_time %>">
                        </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-xs-6">
                        <!-- shipping date[en] -->
                        <div class="form-group">
                            <label>Shipping date[en]</label>
                            <input type="text" class="form-control" name="en_shipping_date" placeholder="Shipping date[en]" value="<%= en_shipping_date %>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <!-- shipping date[ar] -->
                        <div class="form-group">
                            <label>Shipping date[ar]</label>
                            <input type="text" class="form-control" name="ar_shipping_date" placeholder="Shipping date[ar]" value="<%= ar_shipping_date %>">
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-xs-6">
                            <!-- description[en] -->
                            <div class="form-group">
                                <label>Description [en]</label>
                                <textarea class="form-control" name="en_description" placeholder="Description[en]"><%= en_description %></textarea>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <!-- description[ar] -->
                            <div class="form-group">
                                <label>Description [ar]</label>
                                <textarea class="form-control" name="ar_description" placeholder="Description[ar]"><%= ar_description %></textarea>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- paper type[en] -->
                        <div class="form-group">
                            <label>Paper type[en]</label>
                            <input type="text" class="form-control" name="en_paper_types" placeholder="Paper type[en]" value="<%= en_paper_types %>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <!-- paper type[ar] -->
                        <div class="form-group">
                            <label>Paper type[ar]</label>
                            <input type="text" class="form-control" name="ar_paper_types" placeholder="Paper type[ar]" value="<%= ar_paper_types %>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- paper weight[en] -->
                        <div class="form-group">
                            <label>Paper weight[en]</label>
                            <input type="text" class="form-control" name="en_paper_weights" placeholder="Paper weight[en]" value="<%= en_paper_weights %>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <!-- paper weight[ar] -->
                        <div class="form-group">
                            <label>Paper weight[ar]</label>
                            <input type="text" class="form-control" name="ar_paper_weights" placeholder="Paper weight[ar]" value="<%= ar_paper_weights %>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- color option[en] -->
                        <div class="form-group">
                            <label>Color option[en]</label>
                            <input type="text" class="form-control" name="en_color_options" placeholder="Color option[en]" value="<%= en_color_options %>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <!-- color option[ar] -->
                        <div class="form-group">
                            <label>Color option[ar]</label>
                            <input type="text" class="form-control" name="ar_color_options" placeholder="Color option[ar]" value="<%= ar_color_options %>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <!-- seo url -->
                        <div class="form-group">
                            <label>Seo url</label>
                            <input type="text" class="form-control" name="seo_url" placeholder="Seo url" value="<%= seo_url %>">
                        </div>
                    </div>
                </div>
              <div class = "row">
                  <div class = "col-xs-3">
                      <!-- Product Image -->
                      <div class="form-group">
                          <label>Product Image</label>
                          <div class="row">
                              <div class="col-md-8">
                                <img src="/media/image/<%= !!image ? image.id : '' %>/<%= !!image ? image.original_name : '' %>" alt="IMAGE" class="col-md-12" />
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                              <input type="file" class="hide" name="e_product_image" id="e_product_image_file">
                              <button type="button" class="btn btn-default file-upload form-control" data-target="e_product_image_file">Change Image</button>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class = "col-xs-3">
                      <!-- Product Hover Image -->
                      <div class="form-group">
                          <label>Product Hover Image</label>
                          <div class="row">
                              <div class="col-md-8">
                                <img src="/media/image/<%= !!hover_image ? hover_image.id : '' %>/<%= !!hover_image ? hover_image.original_name : '' %>" alt="IMAGE" class="col-md-12" />
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                         <div class="row">
                            <div class="col-md-8">
                              <input type="file" class="hide" name="e_product_hover_image" id="e_product_hover_image_file">
                              <button type="button" class="btn btn-default file-upload form-control" data-target="e_product_hover_image_file">Change Image</button>
                            </div>
                         </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary update">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</script>