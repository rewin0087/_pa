<!-- EDIT MODAL -->
<script type="text/template" id="App-Views-EditProductPrintingPaperTypeModal">
  <div class="modal fade edit-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form enctype="multipart/form-data">
          {{ Form::token() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit </h4>
          </div>
          <div class="modal-body">
              <div class="row">
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="id" value="<%= id %>" />
                <input type="hidden" name="file_finishing" value="<%= file_finishing %>" />
                <input type="hidden" name="file_pricing" value="<%= file_pricing %>" />
                <!-- PAPER SETUP -->
                <div class="col-md-6">
                  <h3>Paper setup</h3>
                  <!-- name[en] -->
                  <div class="form-group">
                      <label>Name [en]:</label>
                      <input type="text" class="form-control" name="en_name" placeholder="Name [en]" value="<%= en_name %>">
                  </div>
                  <!-- name[ar] -->
                  <div class="form-group">
                      <label>Name [ar]:</label>
                      <input type="text" class="form-control" name="ar_name" placeholder="Name [ar]" value="<%= ar_name %>">
                  </div>
                  <!-- description[en] -->
                  <div class="form-group">
                      <label>Description [en]:</label>
                      <textarea class="form-control" name="en_description" placeholder="Description [en]"><%= en_description %></textarea>
                  </div>
                  <!-- description[ar] -->
                  <div class="form-group">
                      <label>Description [ar]:</label>
                      <textarea class="form-control" name="ar_description" placeholder="Description [ar]"><%= ar_description %></textarea>
                  </div>
                  <!-- Cut Off time -->
                  <div class="form-group">
                      <label>Cut Off Time:</label>
                      <select name="cutoff_time_id" id="cutoff_time_id" class="select-picker form-control">
                        
                      </select>
                  </div>
                </div>
                <!-- PRINTER SETUP -->
                <div class="col-md-6">
                  <h3>Printer setup</h3>
                  <!-- Existing Printer -->
                  <div class="form-group">
                    <label>Existing Printers:</label>
                    <select name="paper_printer_id" id="paper_printer_id" class="select-picker form-control">
                    </select>
                  </div>
                  <!-- Printer Api -->
                  <div class="form-group">
                    <label>Printer API:</label>
                    <input type="text" class="form-control" name="printer_api" placeholder="Printer API" value="<%= printer_api %>">
                  </div>
                  <!-- Price list -->
                  <div class="form-group">
                    <label>Price List Setup</label>
                    <p class="help-block">Upload Price List(.xls only):</p>
                    <div class="input-group">
                    
                      <input type="file" id="file_price_list" data-input-remove="file_price_remove" data-input-name="file_price_list_name" class="input-file hide" name="file_price_list" accept="application/vnd.ms-excel, application/xls">
                      
                      <input type="text" id="file_price_list_name" class="form-control">
                      
                      <span class="input-group-btn">
                        <button class="btn btn-default file-remove hiding" readonly="readonly" data-input-name="file_price_list_name" id="file_price_remove" data-target="file_price_list" type="button">Remove</button>
                        <button class="btn btn-default file-upload" data-target="file_price_list" type="button">Select File</button>
                      </span>
                    </div>
                  </div>
                  <!-- Finishing list -->
                  <div class="form-group">
                    <label>Finishing List Setup</label>
                    <p class="help-block">Upload Finishing List(.xls only):</p>
                    <div class="input-group">

                      <input type="file" id="file_finishing_list" data-input-remove="file_finishing_remove" data-input-name="file_finishing_list_name" class="input-file hide" name="file_finishing_list" accept="application/vnd.ms-excel, application/xls">
                      
                      <input type="text" id="file_finishing_list_name" class="form-control">
                      
                      <span class="input-group-btn">
                        <button class="btn btn-default file-remove hiding" readonly="readonly" data-input-name="file_finishing_list_name" id="file_finishing_remove" data-target="file_finishing_list" type="button">Remove</button>
                        <button class="btn btn-default file-upload" data-target="file_finishing_list" type="button">Select File</button>
                      </span>
                    </div>
                  </div>
                  <input type="hidden" name="print_product_id" value="{{ $print_product_id }}">
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