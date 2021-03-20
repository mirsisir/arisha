@extends('layouts.admin.base')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Sisirs</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sisirs.sisir.create') }}" class="btn btn-success" title="Create New Sisir">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($sisirs) == 0)
            <div class="panel-body text-center">
                <h4>No Sisirs Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Charge</th>
                            <th>Category</th>
                            <th>Employee Charge</th>
                            <th>Hourly</th>
                            <th>Basic Price</th>
                            <th>Km Price</th>
                            <th>Stop Over Price</th>
                            <th>Waiting Price</th>
                            <th>Helpers</th>
                            <th>S P M</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sisirs as $sisir)
                        <tr>
                            <td>{{ $sisir->name }}</td>
                            <td>{{ $sisir->charge }}</td>
                            <td>{{ optional($sisir->category)->name }}</td>
                            <td>{{ $sisir->employee_charge }}</td>
                            <td>{{ ($sisir->hourly) ? 'Yes' : 'No' }}</td>
                            <td>{{ $sisir->basic_price }}</td>
                            <td>{{ $sisir->km_price }}</td>
                            <td>{{ $sisir->stop_over_price }}</td>
                            <td>{{ $sisir->waiting_price }}</td>
                            <td>{{ $sisir->helpers }}</td>
                            <td>{{ $sisir->SPM }}</td>

                            <td>

                                <form method="POST" action="{!! route('sisirs.sisir.destroy', $sisir->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sisirs.sisir.show', $sisir->id ) }}" class="btn btn-info" title="Show Sisir">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sisirs.sisir.edit', $sisir->id ) }}" class="btn btn-primary" title="Edit Sisir">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Sisir" onclick="return confirm(&quot;Click Ok to delete Sisir.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $sisirs->render() !!}
        </div>

        @endif

    </div>
@endsection
