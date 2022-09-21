@extends('admin.layouts.app')
@section('title')
Admin Profile
@endsection
@section('page_title')
  Admin Profile
@endsection
@section("content")
<div class="container-fluid">
    <div class="row mt-4">
      <div class="col-8 offset-2 mt-2 mb-3">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <legend class="text-center">Admin Profile</legend>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    @if(Session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    @if(Session('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session('errors')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                  <form class="form-horizontal" id="edit" method="post" action="{{route('admin.profile_update')}}"">
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="name" name="name" class="form-control" value="{{$user->name}}" id="name" placeholder="Enter Name ...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" id="email" placeholder="Enter Email ...">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="phone" name="phone" class="form-control" value="{{$user->phone}}" id="inputPhone" placeholder="Enter Phone ...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea cols="20" name="address" rows="10" class="form-control"  id="address" placeholder="Enter Address ... ">{{$user->address}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10 mt-2">
                           <select name="gender" class="custom-select gender">
                               <option value="">--Please Choose --</option>
                               <option @if($user->gender == 'male') selected @endif value="male">Male</option>
                               <option  @if($user->gender == 'female') selected @endif value="female">Female</option>
                           </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn bg-dark text-white">Update</button>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a href="{{route('admin.change_password')}}">Change Password</a>
                        </div>
                    </div>
                </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateAdminProfileRequest', '#edit'); !!}
<script>
</script>
@endsection