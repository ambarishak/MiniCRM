@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        </div>
        
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active "><a class="btn btn-primary"> Add Company</a></li>
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
                  <form class="form-horizontal" method="POST"  action="{{route('company.store') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <div class="form-group"><label class="col-sm-2 control-label">Company Name:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="name" placeholder="Company name"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">email:</label>
                            <div class="col-sm-10"><input type="email" class="form-control" name="email" placeholder="email"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">logo :</label>
                            <div class="col-sm-10"><input type="file" name="logo" class="form-control" ></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Web site:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="website" placeholder="website"></div>
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