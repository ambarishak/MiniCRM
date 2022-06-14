@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        </div>
        
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active "><a class="btn btn-primary" data-toggle="tab" href="#tab-1"> Add Employee</a></li>
        </ul>
      <div class="tab-content">
          <div id="tab-1" class="tab-pane active">
              <div class="panel-body">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <form class="form-horizontal" method="POST"  action="{{route('employee.update',['id' => $employee->id]) }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <div class="form-group"><label class="col-sm-2 control-label">First Name:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$employee->first_name}}"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Last Name:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$employee->last_name}}"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">email:</label>
                            <div class="col-sm-10"><input type="email" class="form-control" name="email" placeholder="email" value="{{$employee->email}}"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">phone number :</label>
                            <div class="col-sm-10"><input type="text" name="phone_number" class="form-control"  value="{{$employee->phone_number}}"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Company:</label>
                            <select class="form-control" name="company_id">
                            <option value="">Select Company</option>
                            @foreach($companies as $company_list) var_dump($company_list);exit;
                            <option value="{{$company_list->id}}" {{$employee->company_id == $company_list->id ? 'selected':''}}>{{$company_list->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        </div>               
                    </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection