<div class="container">
@if($updateMode)
        @include('livewire.supplier.supplier_edit')
    @elseif($createMode)
        @include('livewire.supplier.supplier_create')
    @else
    <div class="card"> 
        <div class="card-header">
            <h3 class="card-title float-left">List Of Suppliers</h3>
            <button wire:click="add" class="btn btn-info float-right">+Add Supplier</button>
        </div>
        <div class="card-body">
        
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
        
    <table id="ProductViewTable" class="table table-bordered table-hover ">
      <caption>List of Suppliers</caption>
      <thead>
          <tr>
            <th>SI</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Email</th>
            <th>Website</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @php $c=0;@endphp
        @foreach($suppliers as $supplier)
            @php $c=$c+1; @endphp
                <tr>
                <td>{{ $c }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->address }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->website }}</td>
                <td>
                <button wire:click="edit({{ $supplier->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="selectItem({{ $supplier->id}})" class="btn btn-sm btn-danger">Delete</button>                </td>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
  </div>
  </div>
  @endif
  <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-labelledby="modalFormDeletePost" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormDeletePost">Delete Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Do you wish to continue?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="refresh" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button wire:click="delete" type="button" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
    </div>
</div>

@push('js')
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
                                    .css( 'font-size', '20pt' )
                                    .prepend(
                                        '<center><h2>Company: Dynamic</h2><p><b><u>Supplier Setting Report</u></b></p></center>'
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
            } );
            $('#copyButton').hide();
            $('#ProductViewTable').on('dblclick',function(e){
                $('#copyButton').click();
            });
        } );
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
                                    .css( 'font-size', '20pt' )
                                    .prepend(
                                        '<center><h2>Company: Dynamic</h2><p><b><u>Supplier Setting Report</u></b></p></center>'
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
    
</script>
@endpush