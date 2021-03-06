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
                <h3 class="card-title float-left">Allocated Uniforms</h3>
                <button class="btn btn-info float-right" data-toggle="modal" data-target="#add">+Allocate Uniform</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="uniforms" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>SI</th>
                    <th>Product Name</th>
                    <th>Employee Name</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $c=0;@endphp
                    @foreach($uniforms as $uniform)
                     @php $c=$c+1; @endphp
                    <tr>
                        <td>{{ $c }}</td>
                        <td>{{ $uniform->product->product_name }}</td>
                        <td>{{ $uniform->employee->fname }} {{ $uniform->employee->lname }}</td>
                        <td>{{ $uniform->quantity }}</td>
                        <td>{{ $uniform->date }}</td>
                        <td>
                            <button  class="btn btn-primary btn-sm" id="suppabc" data-id="{{$uniform->id}}" data-toggle="modal" data-target="#editmodal" onClick="open_container2(this);">Edit</button>
                            <button  class="btn btn-danger btn-sm" onclick="deleteConfirmation({{$uniform->id}})">Delete</button>
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
            <form method="POST" action="{{route('uniform.allotments.save')}}" accept-charset="UTF-8" id="contact_add_form" novalidate="novalidate" autocomplete="off">
            @csrf
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Allocate Uniform</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">

                            <label for="employee_id">Employee Name</label><br>
                            <select name="employee_id" id="employee_id" class="form-control">
                                <option value="">--Select Employee--</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id}}">{{ $employee->fname}}  {{ $employee->lname}}</option>
                                @endforeach
                            </select>
                            @error('employee_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="product_id">Poduct Name</label><br>
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="">--Select Product--</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>
                        @error('product_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input id="quantity" class="form-control" name="quantity" type="number" style="height: 30px;">
                        @error('quantity') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-6">
                      <div class="form-group">
                        <label for="date">Date</label>
                        <input id="date" class="form-control" name="date" type="date" style="height: 30px;">
                        @error('date') <span class="text-danger error">{{ $message }}</span>@enderror
                      </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
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
                            <label for="edit_employee_id">Employee Name</label><br>
                            <select name="edit_employee_id" id="edit_employee_id" class="form-control">
                                <option value="">--Select Employee--</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id}}">{{ $employee->name}}</option>
                                @endforeach
                            </select>
                            @error('edit_employee_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="edit_product_id">Poduct Name</label><br>
                        <select name="edit_product_id" id="edit_product_id" class="form-control">
                            <option value="">--Select Product--</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>
                        @error('edit_product_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
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
    $(document).ready(function() {
        $('#employee_id').select2();
        $('#product_id').select2();
        $('#edit_employee_id').select2();
        $('#edit_product_id').select2();


      $("#uniforms").DataTable({
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
                '<center><h2>Company: Dynamic</h2><p><b><u>Uniform Allocation Report</u></b></p></center>'
              );
            },
            exportOptions: {
              columns: [0,1,2,3,4]
            },
            attr:  {
              id: 'copyButton'
            }
          }
        ]
      });
      $('#copyButton').hide();
      $('#uniforms').on('dblclick',function(e){
          $('#copyButton').click();
      });
    });
    function open_container2(id){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url:'{{ url('/admin/uniform/allotments/edit') }}',
        method: 'POST',
        dataType: 'JSON',
        data: { id:id.getAttribute('data-id') },
        success: function(data){
          $('#assign_id').val(data.id);
          $("#edit_employee_id").prepend("<option selected='selected' value=\""+data.employee_id+"\">"+data.employee_name+"</option>");
          $("#edit_product_id").prepend("<option selected='selected' value=\""+data.product_id+"\">"+data.product_name+"</option>");
          $('#edit_date').val(data.date);
          $("#edit_quantity").val(data.quantity);
          $('#editmodal').modal('show');
        }
      });
    }
    $(document).ready(function(){
      $('.save').click(function(e){
        e.preventDefault();
        if($('#edit_employee_id').val() == '' || $('#edit_product_id').val() == '' || $('#edit_date').val() == '' || $('#edit_quantity').val() == ''){
            alert("Info fields can't be empty! Please give info to continue.");
            return false;
        }
        var id = $("#assign_id").val();
        var edit_employee_id = $("#edit_employee_id").val();
        var edit_product_id = $("#edit_product_id").val();
        var edit_date = $("#edit_date").val();
        var edit_quantity = $("#edit_quantity").val();

        $.ajax({
          url:'{{ url('/admin/uniform/allotments/update') }}',
          data:'id=' + id + '&edit_employee_id=' + edit_employee_id + '&edit_product_id=' + edit_product_id + '&edit_date=' + edit_date + '&edit_quantity=' + edit_quantity,
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
                    url: "{{ url('/admin/uniform/allotments/delete') }}/" + id,
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
