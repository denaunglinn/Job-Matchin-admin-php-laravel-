@extends('admin.layouts.app')
@section('title')
Create Customer
@endsection
@section('page_title')
Create Customer
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form id="create" action="{{route("admin.customers.store")}}" enctype="multipart/form-data" method="post">
                    @csrf 
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" id="name" name="name" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="phone" name="phone" id="phone" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="address">Address</label>
                              <textarea name="address" id="address" class="form-control"></textarea>
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group ">
                              <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                              <select name="gender" class="custom-select gender">
                                  <option value="">--Please Choose --</option>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                              </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Upload Profile</label>
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="icon-addon"><i class="fas fa-cloud-upload-alt"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="photos[]" class="custom-file-input form-control" id="image" accept="image/*" aria-describedby="icon-addon" multiple>
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                </div>
                            </div>
                            <div class="image_preview"></div>
                        </div>
                    </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="confirm_password">Confirm confirm_Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                        </div>
                    </div>
                        <div class="col-md-12 text-center">
                            <a href="{{route("admin.customers.index")}}">
                                <button type="button" class="btn btn-dark">Cancel</button>
                            </a>
                            <button type="submit" class="btn btn-info">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\StoreCategoryRequest', '#create'); !!}
<script>
   $('#image').on('change', function(event) {
            var total_file = document.getElementById("image").files.length;
            $('[for="image"]').html(total_file + ' files');
            $('.image_preview').html('');
            for (var i = 0; i < total_file; i++) {
                $('.image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' style='width:80px;' class='zoomify'>");
            }
        });
</script>
@endsection