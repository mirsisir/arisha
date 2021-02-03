@extends('layouts.admin.base')
@section('content')

    <div class="card mb-3">

        <div class="card-body">
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
                        @if($s->categorie=='Construction')
                            <td>{{$s->SPM}} Sq m</td>
                        @elseif($s->categorie=='Transport')
                            @if($s->hourly=='1')
                                <td>{{$s->duration}}-H</td>
                            @else
                                <td>...</td>
                            @endif
                        @else
                            <td>{{$s->duration}}-H</td>
                        @endif
                        <td>{{$s->employee->name?? ""}}</td>
                        <td>{{$s->net_charge}}<i class="mdi mdi-currency-eur"></i></td>

                        @if($s->categorie=='Construction')
                            <td>{{$s->service->employee_charge*$s->SPM}}<i class="mdi mdi-currency-eur"></i></td>
                        @elseif($s->categorie=='Transport')
                            @if($s->hourly=='1')
                                <td>{{$s->service->employee_charge*$s->duration}}<i class="mdi mdi-currency-eur"></i></td>
                            @else
                                <td>...</td>
                            @endif
                        @else
                            <td>{{$s->service->employee_charge*$s->duration}}<i class="mdi mdi-currency-eur"></i></td>
                        @endif
                        <td><a href="{{route('employee_bill',$s->id)}}" class="btn btn-info btn-sm">PAY</a></td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>



    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>
@endsection
