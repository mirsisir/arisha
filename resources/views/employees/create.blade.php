@extends('layouts.admin.base')

@section('title', 'Add Employee')

@section('content')

<div class="row text-dark">
    <div class="col-md-12">

        @livewire('employee.create')

    </div>
</div>


@endsection
