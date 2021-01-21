<div>
    @if($updateMode)
        @include('livewire.brand.brand_edit')
    @elseif($createMode)
        @include('livewire.brand.brand_create')
    @else
    <div class="card"> 
        <div class="card-header">
            <h3 class="card-title float-left">Brand List</h3>
            <button wire:click="add" class="btn btn-info float-right" >+ Add Brand</button>
        </div>
        <div class="card-body">
        
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
        <table id="ProductViewTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Brand Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php $c=0;@endphp
            @foreach($brands as $brand)
                @php $c=$c+1; @endphp
                    <tr>
                    <td>{{ $c }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->status }}</td>
                    <td>
                    <button wire:click="edit({{ $brand->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button onclick="deleteConfirmation({{$brand->id}})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    @endif
    
</div>

@push('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons/1.6.5/js/dataTables.buttons.min.js" integrity="sha512-C6bH79vwmIG/SVdXp2MT1SziCMrJ35rywNWqbYFLJXuiQsLlS5PH356A+FjsboOUaVjvtd+ELK3pb9hq0SXNrQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons/1.6.5/js/buttons.print.min.js" integrity="sha512-kYpyIzqFmlPX1c3EhpL4+8AajeawkvGies2wVJcpMZJ/7zupZ/KcHa8QsDng8rtFUn2yPk/0MZolkz3pTqhsPA==" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#ProductViewTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        title: '',
                        customize: function ( win ) {
                                $(win.document.body)
                                    .css( 'font-size', '20px' )
                                    .prepend(
                                        '<center><h2>Company: Dynamic</h2><p><b><u>Uniform Setting Report</u></b></p></center>'
                                    );
                            },
                        exportOptions: {
                            columns: [0,1,2]
                        },
                        attr:  {
                            id: 'copyButton'
                        }
                    }
                ]
            } );
            $('#copyButton').hide();
            $('#ProductViewTable').on('dblclick',function(e){
                $('#copyButton').click();
            });
        } );

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
                    Livewire.emit('delete',$id=id);
                } else {
                    swal("Your data is safe!");
                }
            });  
        }
    
        $(function () {
          
           window.addEventListener('openDeleteModal', event => {
                $("#modalFormDelete").modal('show');
            })

          window.addEventListener('closeDeleteModal', event => {
                      $("#modalFormDelete").modal('hide');
                  }) 
          });
    window.addEventListener('contentChanged', event => {
        $(function () {
          $('#ProductViewTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        title: '',
                        customize: function ( win ) {
                                $(win.document.body)
                                    .css( 'font-size', '20px' )
                                    .prepend(
                                        '<center><h2>Company: Dynamic</h2><p><b><u>Uniform Setting Report</u></b></p></center>'
                                    );
                            },
                        exportOptions: {
                            columns: [0,1,2]
                        },
                        attr:  {
                            id: 'copyButton'
                        }
                    }
                ]
            } );
            $('#copyButton').hide();
            $('#ProductViewTable').on('dblclick',function(e){
                $('#copyButton').click();
            });
      });
    });
    window.addEventListener('refresh', event => {
        location.reload(true);
    });
    window.addEventListener('success', event => {
           swal("Done!", event.detail.message, "success");
           location.reload(true);
    }) ;
</script>
@endpush