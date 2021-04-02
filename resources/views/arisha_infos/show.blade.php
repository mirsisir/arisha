@extends('layouts.admin.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($arishaInfo->name) ? $arishaInfo->name : 'Arisha Info' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('arisha_infos.arisha_info.destroy', $arishaInfo->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('arisha_infos.arisha_info.index') }}" class="btn btn-primary" title="Show All Arisha Info">
                        <i class="fas fa-list-ol"></i>
                    </a>

                    <a href="{{ route('arisha_infos.arisha_info.create') }}" class="btn btn-success" title="Create New Arisha Info">
                        <i class="far fa-plus-square"></i>
                    </a>

                    <a href="{{ route('arisha_infos.arisha_info.edit', $arishaInfo->id ) }}" class="btn btn-primary" title="Edit Arisha Info">
                        <i class="fas fa-edit"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Arisha Info" onclick="return confirm(&quot;Click Ok to delete Arisha Info.?&quot;)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name </dt>
            <dd>{{ $arishaInfo->name }}</dd>
            <dt>Title</dt>
            <dd>{{ $arishaInfo->title }}</dd>
            <dt>Details</dt>
            <dd>{!! $arishaInfo->details !!} </dd>

        </dl>

    </div>
</div>

@endsection
