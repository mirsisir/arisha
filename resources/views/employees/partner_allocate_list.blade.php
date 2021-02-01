@extends('layouts.admin.base')
@section('content')

    @foreach($all_services as $index => $service)
        <div class="card mb-3">

            <div class="card-body">
                <h2 class="text-center bold btn-info p-2">{{$service->name}} </h2>
                <table id="table_id{{$index}}" class="display table-sm">
                    <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Employee Phone</th>
                        <th>Employee Email</th>
                        <th>Remove</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($service->employee as $employee)
                        @php($emp=\App\Models\User::find($employee))
                        <tr>
                            <td>{{$emp->name}}</td>
                            <td>{{$emp->phone}}</td>
                            <td>{{$emp->email}}</td>
                            <td><a href="{{route('partner_allocate_remove',['service'=>$service->id,'emp'=>$emp->id])}}" class=" btn btn-danger "> Remove</a></td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    @endforeach

    <script>


        // $(document).ready( function () {
        //     var i;
        //     for (i = 0; i < 10; i++) {
        //         $('#table_id'.i).DataTable();
        //     }
        //
        // } );




        $(document).ready( function () {
            $('#table_id0').DataTable();
        } );

        $(document).ready( function () {
            $('#table_id1').DataTable();
        } );

        $(document).ready( function () {
            $('#table_id3').DataTable();
        } );

        $(document).ready( function () {
            $('#table_id4').DataTable();
        } );

        $(document).ready( function () {
            $('#table_id5').DataTable();
        } );

        $(document).ready( function () {
            $('#table_id6').DataTable();
        } );

        $(document).ready( function () {
            $('#table_id7').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id8').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id9').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id10').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id11').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id12').DataTable();
        } );




    </script>
@endsection
