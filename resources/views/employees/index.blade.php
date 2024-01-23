@extends('employees.layout')
@section('content')
@if($messge = Session::get('success'))
<div class="alert alert-success text-center">{{ $messge }}</div>
@endif


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>View All Data</h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Download</th>
                                <th>Actions</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach ($employees as $item)
                            <tr>
                             
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Name }}</td>
                                <td>{{ $item->Email }}</td>
                                <td>{{ $item->Phone }}</td>
                                <td class="align-middle">
                                   
                                   
                                    
                                <img src="{{ asset('uploads/'.$item->Image ) }}" class="img-thumbnail"  alt="Employee Image">

                                <td class="text-center"> 
                                    <a href="{{ url('download/'.$item->id) }}" >
                                    <span class="material-icons">downloads</span>
        
                                    </a>
                                </td>
                                    
                                <td>  
                                    <form action="{{ route('employees.destroy', $item->id) }}" method="post">

                                    <a class="btn btn-info" href="{{ url('employees/profile/'.$item->id) }}">Show</a>
                                    
                                    <a href="{{ url('employees/edit/'.$item->id) }}" class="btn btn-primary btn-md ">Edit</a>
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-danger btn-md">Delete</button>
                                    </form>                           
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  
                    </div>
    </div>
</div>

@endsection