@extends('layouts.admin.base')

@section('content')

    <div class="card">
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($arisah_info as  $info)
                    <tr>
                        <td>{{$info->name}}</td>
                        <td>{{$info->translation()->title ?? " "}}</td>
                        <td>@if(!empty($info))
                                {!!  Illuminate\Support\Str::limit($info->translation()->details,50 ) !!}
                            @endif
                            </td>
                        <td><a href="{{route('edit.info',$info->id)}}" class="btn btn-outline-info">Edit</a></td>

                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection

@section('js')


    <script type="text/javascript">

        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script>

@endsection
