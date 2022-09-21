@extends('admin.layouts.app')
@section('title')
Change Password
@endsection
@section('page_title')
Change Password
@endsection
@section("content")
<div class="container-fluid">
    <div class="row mt-4">
      <div class="col-8 offset-2 mt-5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <legend class="text-center">Change Password</legend>
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
                  <form class="form-horizontal" autocomplete="off" id="update" method="post" action="{{route('admin.update_password')}}"">
                    @csrf
                    <div class="form-group row">
                      <label for="old_password" class="col-sm-2 ">Old Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter Old Password ...">
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_password" class="col-sm-2 ">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter New Password ...">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="confirm_password" class="col-sm-2 ">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password ...">
                        </div>
                      </div>
                    
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn bg-dark text-white">Change Password</button>
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
{!! JsValidator::formRequest('App\Http\Requests\UpdateAdminPasswordRequest', '#update'); !!}
<script>
</script>
@endsection