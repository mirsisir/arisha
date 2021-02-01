@extends('layouts.admin.base')
@section('content')

    <div class="card mb-3">

        <div class="card-body">
            <h2 class="text-center bold btn-info p-2">df</h2>
            <table id="table_id" class="display table-sm">
                <thead>
                <tr>
                    <th>Voucher-NO</th>
                    <th>Service Name</th>
                    <th>Service Date</th>
                    <th>Service Duration</th>
                    <th>Employee Name</th>
                    <th>Service Bill</th>
                    <th>Employee Bill</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($service as $s)

                    <tr>
                        <td>DE-{{$s->id}}</td>
                        <td>{{$s->service->name}}</td>
                        <td>{{$s->date}}</td>
                        <td>{{$s->duration}}</td>
                        <td>{{$s->employee->fname?? ""}}</td>
                        <td>{{$s->net_charge}}<i class="mdi mdi-currency-eur"></i> </td>
                        <td>{{$s->service->employee_charge*$s->duration}}<i class="mdi mdi-currency-eur"></i></td>
                        <td><a href="" class="btn btn-info btn-sm">PAY</a> </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>



    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection
