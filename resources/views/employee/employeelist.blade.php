@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="align-left">
        <ul class="nav nav-tabs">
            <li class="active "><a class="btn btn-primary" data-toggle="tab" href="{{ route('employee.create')}}"> Add Employee</a></li>
        </ul>
        <p></p>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>{{'First Name'}}</th>
                <th>{{'Last Name'}}</th>
                <th>{{'Email'}}</th>
                <th>{{'Phone Number'}}</th>
                <th>{{'Company'}}</th>
                <th>{{'action'}}</th>
            </tr>
            </thead>
            <tbody>
                    @forelse($employees as $employee)
                    <tr>
         
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td> {{$employee->email}}</td>
                        <td> {{$employee->phone_number}}</td>
                        <td> {{$employee->company}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('employee.edit', ['id' => $employee->id])}}" role="button">Edit</a>
                            <p></p>
                            <form action="{{ route('employee.distroy', ['id' => $employee->id])}}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to delete this data');">Delete</button>
                            </form>
                        </td>
                        
             </tr>
         
         @empty
         
             <h1>No Employees</h1>
         
         @endforelse
            </tbody>
            </table>
            
        </div>
    </div>  
</div>
@endsection
