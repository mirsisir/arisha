@extends('layouts.admin.base')
        
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if ($success = Session::get('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $success }}</strong>
                </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title float-left">Allocated Products</h3>
                <button class="btn btn-info float-right" data-toggle="modal" data-target="#add">+Allocate Products</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>SI</th>
                    <th>Product Name</th>
                    <th>Company Name</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $c=0;@endphp
                    @foreach($allocatedproducts as $product)
                     @php $c=$c+1; @endphp
                    <tr>
                        <td>{{ $c }}</td>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->company->company_name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->date }}</td>
                        <td>
                            <button  class="btn btn-primary btn-sm" id="suppabc" data-id="{{$product->id}}" data-toggle="modal" data-target="#editmodal" onClick="open_container2(this);">Edit</button>
                            <button  class="btn btn-danger btn-sm" onclick="deleteConfirmation({{$product->id}})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form method="POST" action="{{route('product.allotments.save')}}" accept-charset="UTF-8" id="add_form" novalidate="novalidate" autocomplete="off">
            @csrf
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Allocate Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                            
                            <label for="company_id">Company Name</label><br>
                            <select name="company_id" id="company_id" class="form-control">
                                <option value="">--Select Company--</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id}}">{{ $company->company_name}}</option>
                                @endforeach
                            </select>
                            @error('company_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="product_id">Poduct Name</label><br>
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="">--Select Product--</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select> 
                        @error('product_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                        <label for="quantity" >Quantity (<strong id="qty" style="color:red"></strong>) </label>
                        <input id="quantity" class="form-control" name="quantity" type="number" style="height: 30px;"> 
                        @error('quantity') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-6">
                      <div class="form-group">
                        <label for="date">Date</label>
                        <input id="date" class="form-control" name="date" type="date" value="<?php echo date("Y-m-d");?>" style="height: 30px;"> 
                        @error('date') <span class="text-danger error">{{ $message }}</span>@enderror
                      </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="add_product" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
      </div>
  </div>

  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="alert alert-success alert-block" id="CartMsg"></div>
          <form method="POST" action="" accept-charset="UTF-8" id="cust_edit" novalidate="novalidate">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Allocated Uniform</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                            <input type="hidden" name="assign_id" id="assign_id" value="">
                            <label for="edit_company_id">Company Name</label><br>
                            <select name="edit_company_id" id="edit_company_id" class="form-control">
                                <option value="">--Select Company--</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id}}">{{ $company->company_name}}</option>
                                @endforeach
                            </select>
                            @error('edit_company_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="edit_product_id">Poduct Name</label><br>
                        <select name="edit_product_id" id="edit_product_id" class="form-control">
                            <option value="">--Select Product--</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select> 
                        @error('edit_product_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                        <label for="quantity">Quantity (Available <strong id="edit_qty" style="color:red"></strong>)</label>
                        <input id="edit_quantity" class="form-control" name="edit_quantity" type="number" style="height: 30px;"> 
                        @error('edit_quantity') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-6">
                      <div class="form-group">
                        <label for="edit_date">Date</label>
                        <input id="edit_date" class="form-control" name="edit_date" type="date" style="height: 30px;"> 
                        @error('edit_date') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary save">Save Changes</button>
            </div>
          </form>
          </div>
      </div>
  </div>
@endsection
@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons/1.6.5/js/dataTables.buttons.min.js" integrity="sha512-C6bH79vwmIG/SVdXp2MT1SziCMrJ35rywNWqbYFLJXuiQsLlS5PH356A+FjsboOUaVjvtd+ELK3pb9hq0SXNrQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons/1.6.5/js/buttons.print.min.js" integrity="sha512-kYpyIzqFmlPX1c3EhpL4+8AajeawkvGies2wVJcpMZJ/7zupZ/KcHa8QsDng8rtFUn2yPk/0MZolkz3pTqhsPA==" crossorigin="anonymous"></script>
<script type="text/javascript">
    var stock=0;
    var alloted_stock=0;
    $(document).ready(function() {
        $('#company_id').select2();
        $('#product_id').select2();
        $('#edit_company_id').select2();
        $('#edit_product_id').select2();
        $('#product_id').on('change',function(e){
          var p=$('#product_id').val();
            get_stock(p);
        });
        $('#edit_product_id').on('change',function(e){
          var q=$('#edit_product_id').val();
            get_stock_edit(q);
        });
      $("#products").DataTable({
        "responsive": true,
        "autoWidth": false,
        "order": [[ 0, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'print',
            title: '',
            customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '20pt' )
              .prepend(
                '<center><h2>Company: Dynamic</h2><p><b><u>Product Allocation Report</u></b></p></center>'
              );
            },
            exportOptions: {
              columns: [0,1,2,3,4,5]
            },
            attr:  {
              id: 'copyButton'
            }
          }
        ]
      });
      $('#copyButton').hide();
      $('#products').on('dblclick',function(e){
          $('#copyButton').click();
      });
    });
    function get_stock(p){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url:'{{ url('/admin/product/allotments/stock') }}',
        method: 'POST',
        dataType: 'JSON',
        data: { id:p },
        success: function(data){
          stock=data.quantity;
          $( "#qty" ).html(stock);
        }
      });
    }
    function get_stock_edit(p){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url:'{{ url('/admin/product/allotments/stock') }}',
        method: 'POST',
        dataType: 'JSON',
        data: { id:p },
        success: function(data){
          stock=data.quantity;
          $( "#edit_qty" ).html(stock);
        }
      });
    }
    $(document).ready(function(){
      $('#add_product').click(function(e){
        e.preventDefault();
        if($('#company_id').val() == '' || $('#product_id').val() == '' || $('#date').val() == '' || $('#quantity').val() == ''){
            alert("Info fields can't be empty! Please give info to continue.");
            return false;
        }
        if( Number($('#quantity').val()) > stock){
            alert("Insufficient Quantity");
            return false;
        }
        $('#add_form').submit();
      });
    });
    function open_container2(id){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url:'{{ url('/admin/product/allotments/edit') }}',
        method: 'POST',
        dataType: 'JSON',
        data: { id:id.getAttribute('data-id') },
        success: function(data){
          $('#assign_id').val(data.id);
          $("#edit_company_id").prepend("<option selected='selected' value=\""+data.company_id+"\">"+data.company_name+"</option>");
          $("#edit_product_id").prepend("<option selected='selected' value=\""+data.product_id+"\">"+data.product_name+"</option>");
          $('#edit_date').val(data.date);
          $("#edit_quantity").val(data.quantity);
          stock=Number(data.stock);
          $( "#edit_qty" ).html(stock);
          alloted_stock=Number(data.quantity);
          $('#editmodal').modal('show');
        }
      });
    }
    $(document).ready(function(){
      $('.save').click(function(e){
        e.preventDefault();
        if($('#edit_company_id').val() == '' || $('#edit_product_id').val() == '' || $('#edit_date').val() == '' || $('#edit_quantity').val() == ''){
            alert("Info fields can't be empty! Please give info to continue.");
            return false;
        }
      
        var total=alloted_stock+stock;
        if( Number($('#edit_quantity').val()) > total){
            alert("Insufficient Quantity");
            return false;
        }

        var id = $("#assign_id").val();
        var edit_company_id = $("#edit_company_id").val();
        var edit_product_id = $("#edit_product_id").val();
        var edit_date = $("#edit_date").val();
        var edit_quantity = $("#edit_quantity").val();
        var stock_rem=total-Number($('#edit_quantity').val());
        
        $.ajax({
          url:'{{ url('/admin/product/allotments/update') }}',
          data:'id=' + id + '&edit_company_id=' + edit_company_id + '&edit_product_id=' + edit_product_id + '&edit_date=' + edit_date + '&edit_quantity=' + edit_quantity +'&stock_rem=' + stock_rem,
          type:'get',
          success:function(response){
            $("#CartMsg").show();
            console.log(response);
            $("#CartMsg").html(response);
				    window.setTimeout(function(){ 
              location.reload();
            } ,2000);
          },
          error: function(ts) {         
            // alert(ts.responseText);
            window.setTimeout(function(){ 
                            location.reload();
                        } ,2000);
          }
        });
      });
    });
    function deleteConfirmation(id) {
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this  data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
      .then((willDelete) => {
        if (willDelete) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/admin/product/allotments/delete') }}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                        } else {
                            swal("Error!", results.message, "error");
                        }
                        window.setTimeout(function(){ 
                            location.reload();
                        } ,3000);
                    }
                });
        } else {
            swal("Your data is safe!");
        }
    });  
    }
</script>

@endpush

<style>
 .modal-content {
   margin-top:-100px;
   color:black;
  }
  .select2{
    width:100% !important;
  }
  .form-control{
    height:30px;
  }
</style>