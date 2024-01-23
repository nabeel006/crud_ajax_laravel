@extends('employees.layout')
@section('content')
<div class="wrapperdiv">
    @if($employee)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">
    <div class="card" style="width: 20rem;">
    <img src="{{ asset('uploads/'.$employee->image ) }}" class="card-img-top">

        <div class="card-body">
        <h5 class="card-title">{{ $employee->name }}</h5>
        <p class="card-text">{{ $employee->joining_date }} | {{ $employee->joining_date }}</p>
        </div>
        </div>
    </div>
    <div class="col-4"></div>
</div>
    @endif
</div>
@endsection