@extends('admin.layouts.app')
@section('title')
Edit Customer
@endsection
@section('page_title')
Edit Customer
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form id="edit" action="{{route("admin.customers.update",$customer->id)}}" enctype="multipart/form-data"  method="post">
                    @method('PUT')
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{$customer->name}}" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{$customer->email}}" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" name="phone" value="{{$customer->phone}}" id="phone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control">{{$customer->address}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                <select name="gender" class="custom-select gender">
                                    <option value="">--Please Choose --</option>
                                    <option @if($customer->gender == 'male') selected @endif value="male">Male</option>
                                    <option @if($customer->gender == 'female') selected @endif value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Upload Image</label>
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="icon-addon"><i class="fas fa-cloud-upload-alt"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="photos[]" class="custom-file-input form-control" id="image" accept="image/*" aria-describedby="icon-addon" multiple>
                                        <label class="custom-file-label" for="image">Choose Image</label>
                                    </div>
                                </div>
                                <div class="image_preview">
                                    @foreach($customer->photos as $photo)
                                    <img src="{{$photo->customer_photo_path()}}" height="80px" alt="">
                                    @endforeach
                                </div>
                            </div>
                         </div>
                        <div class="col-md-12 text-center">
                            <a href="{{route("admin.customers.index")}}">
                                <button type="button" class="btn btn-dark">Cancel</button>
                            </a>
                            <button type="submit" class="btn btn-info">Update</button>
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