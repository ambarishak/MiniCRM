@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="align-left">
        <ul class="nav nav-tabs">
            <li class="active "><a class="btn btn-primary" data-toggle="tab" href="{{ route('company.create')}}"> Add Company</a></li>
        </ul>
        <p></p>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>{{'CompanyName'}}</th>
                <th>{{'Email'}}</th>
                <th>{{'Logo'}}</th>
                <th>{{'Website'}}</th>
                <th>{{'action'}}</th>
            </tr>
            </thead>
            <tbody>
                    @forelse($companies as $company)
                    <tr>
         
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td><img src="{{ url('storage/'.$company->logo) }}" alt="image" title="{{$company->logo}}" /></td>
                        <td> {{$company->website}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('company.edit', ['id' => $company->id])}}" role="button">Edit</a>
                            <p></p>
                            <form action="{{ route('company.distroy', ['id' => $company->id])}}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to delete this data');">Delete</button>
                            </form>
                        </td>
                        
             </tr>
         
         @empty
         
             <h1>No Company</h1>
         
         @endforelse
            </tbody>
            </table>
            <div>
                {{ $companies->links() }}
            </div>
        </div>
    </div>  
</div>
@endsection
