@extends('layouts.admin.base')

@section('title', 'Department')

@section('content')

<div class="row text-dark">
    <div class="col-md-12">

        @livewire('department.crud')

    </div>
</div>


@endsection
