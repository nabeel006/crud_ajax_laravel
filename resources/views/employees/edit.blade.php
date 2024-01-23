@extends('employees.layout')
@section('content')
<div class="wrapperdiv">
    <div class="formcontainer">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2>Edit Employee</h2>
                </div>
            </div>
        </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <strong>Oops! There were some problems with your input.</strong>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

        <form autocomplete="on" action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-control">Name:</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                value="{{ $employee->Name }}"
                            />
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-control">Email:</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="email"
                                id="email"
                                class="form-control"
                                value="{{ $employee->Email }}"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-control">Phone:</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="form-control"
                                value="{{ $employee->Phone }}"
                            />
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-control"
                            >Image:</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="file"
                                name="image"
                                id="image"
                               
                                class="form-control-file"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>

                        <div class="col-sm-10 text-center">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection