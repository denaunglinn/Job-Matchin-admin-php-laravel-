@extends('admin.layouts.app')
@section('title')
Edit Sub Category
@endsection
@section('page_title')
Edit Sub Category
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12 my-3">
            <a href="{{route("admin.sub_categories.index")}}">
                <button class="btn btn-dark">Back</button>
            </a>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Sub Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form id="edit" action="{{route("admin.sub_categories.update", $category->id)}}"  method="POST">
                    @method('PUT')
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"> Title</label>
                                <input type="text" value="{{$category->title}}" name="title" id="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 m-3 text-center">
                            <a href="{{route("admin.sub_categories.index")}}">
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
{!! JsValidator::formRequest('App\Http\Requests\StoreSubCategoryRequest', '#edit'); !!}
@endsection