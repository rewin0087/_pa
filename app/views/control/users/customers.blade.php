
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Customers</h3>
        </div>
        <div class="box-body">
            <!-- LIST -->
            <table class="table table-bordered table-hover mTop-20" id="customers-table">
                <thead  class="theadcolor">
                    <tr>
                        <th width="100px">id</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th width="100px">Orders</th>
                        <th width="100px"></th>
                    </tr>
                </thead>
                <tbody class="tbodycolor">
                   <!-- Render the collection here -->
                   <tr>
                       <td colspan="4">
                           <p class="center">No records found.</p>
                       </td>
                   </tr>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-customer-modal">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add
                </a>
            </div>
        </div>
    </div>
</div>

<!-- LIST DETAIL ITEM -->
@include('control.users._partials.customers.list-detail')

<!-- ADD MODAL -->
@include('control.users._partials.customers.add-modal')


