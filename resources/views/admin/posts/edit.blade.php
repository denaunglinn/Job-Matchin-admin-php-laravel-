@extends('admin.layouts.app')
@section('title')
Update Post
@endsection
@section('extra_css')
<style>
    .zoomify{
        width: auto;
        height: 100px;
    }
</style>
@endsection
@section('page_title')
       Update Post
@endsection
@section('content')
        <div class="col-12">
          <div class="card">  
              <div class="card-body">
                <form id="update" action="{{route("admin.posts.update",$post->id)}}" enctype="multipart/form-data" method="post" >
                    @method('PUT')
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control category">
                                    <option value="">--Please Choose--</option>
                                    @foreach($categories as $category)
                                    <option @if($post->category->id == $category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <select name="sub_category_id" class="form-control sub_category">
                                    <option value="">--Please Choose--</option>
                                    @if($sub_categories)
                                    <option  value="{{$sub_categories->id}}" selected>{{$sub_categories->title}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" value="{{$post->title}}" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control">{{$post->description}}</textarea>
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
                                    @foreach($post->photos as $photo)
                                    <img src="{{$photo->photo_path()}}" height="80px" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{route("admin.posts.index")}}">
                                <button type="button" class="btn btn-dark">Cancel</button>
                            </a>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                        
                    </div>
                </form>
              </div>
          </div>
        </div>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\StoreCategoryRequest', '#update'); !!}
<script>
   
   $('.category,.sub_category').select2({
            allowClear: true,
            theme: 'bootstrap',
        });

        $('.category').on('change', function(event){
            var category = $('.category').val();
            $.ajax({
                    url: '/admin/data/sub_categories',
                    type: 'GET',
                    data: { category },
                    success: (res) => {
                        $("#pageloader").fadeOut();
                        if (res.result == 1) {
                            var sub_categories = res.data;
                            var sub_category_options = sub_categories.map((sub_categories) => {
                                return `<option value="${sub_categories.id}" >${sub_categories.title}</option>`;
                            });

                            if (!category) {
                                $('.sub_category').html('');
                            }else{
                                $('.sub_category').html('<option value="">-- Please Choose --</option>' + sub_category_options);
                                var sub_category = $('.sub_category').val();
                            }
                        }
                    }
                });
        }); 

        $('#image').on('change', function(event) {
            var total_file = document.getElementById("image").files.length;
            $('[for="image"]').html(total_file + ' files');
            $('.image_preview').html('');
            for (var i = 0; i < total_file; i++) {
                $('.image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' class='zoomify'>");
            }
        });
</script>
@endsection