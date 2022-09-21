@extends('admin.layouts.app')
@section('title')
Edit Company
@endsection
@section('page_title')
Edit Company
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form id="edit" action="{{route("admin.companies.update",$company->id)}}" enctype="multipart/form-data"  method="post">
                    @method('PUT')
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" value="{{$company->name}}" name="name" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="company_type">Company Type</label>
                                <select name="company_type_id" class="form-control company_type" id="company_type">
                                  <option value="">-- Please Choose --</option>
                                  @foreach($company_types as $type)
                                    <option @if($type->id == $company->company_type_id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{$company->description}}</textarea>
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
                                    @foreach($company->photos as $photo)
                                    <img src="{{$photo->company_photo_path()}}" height="80px" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <a href="{{route("admin.companies.index")}}">
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
{!! JsValidator::formRequest('App\Http\Requests\StoreCompanyRequest', '#create'); !!}
<script>
        $('.company_type').select2({
            allowClear: true,
            theme: 'bootstrap',
        });

        $('#image').on('change', function(event) {
            var total_file = document.getElementById("image").files.length;
            $('[for="image"]').html(total_file + ' files');
            $('.image_preview').html('');
            for (var i = 0; i < total_file; i++) {
                $('.image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' height='80px' class='zoomify'>");
            }
        });
</script>
@endsection