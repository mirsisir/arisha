@extends('layouts.admin.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($sisir->name) ? $sisir->name : 'Sisir' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sisirs.sisir.destroy', $sisir->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sisirs.sisir.index') }}" class="btn btn-primary" title="Show All Sisir">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sisirs.sisir.create') }}" class="btn btn-success" title="Create New Sisir">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sisirs.sisir.edit', $sisir->id ) }}" class="btn btn-primary" title="Edit Sisir">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sisir" onclick="return confirm(&quot;Click Ok to delete Sisir.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $sisir->name }}</dd>
            <dt>Charge</dt>
            <dd>{{ $sisir->charge }}</dd>
            <dt>Category</dt>
            <dd>{{ optional($sisir->category)->name }}</dd>
            <dt>Employee Charge</dt>
            <dd>{{ $sisir->employee_charge }}</dd>
            <dt>Hourly</dt>
            <dd>{{ ($sisir->hourly) ? 'Yes' : 'No' }}</dd>
            <dt>Basic Price</dt>
            <dd>{{ $sisir->basic_price }}</dd>
            <dt>Km Price</dt>
            <dd>{{ $sisir->km_price }}</dd>
            <dt>Stop Over Price</dt>
            <dd>{{ $sisir->stop_over_price }}</dd>
            <dt>Waiting Price</dt>
            <dd>{{ $sisir->waiting_price }}</dd>
            <dt>Helpers</dt>
            <dd>{{ $sisir->helpers }}</dd>
            <dt>Details</dt>
            <dd>{{ $sisir->details }}</dd>
            <dt>S P M</dt>
            <dd>{{ $sisir->SPM }}</dd>

        </dl>

    </div>
</div>

@endsection
