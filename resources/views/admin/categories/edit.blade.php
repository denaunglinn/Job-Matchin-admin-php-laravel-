@extends('admin.layouts.app')
@section('title')
Edit Category
@endsection
@section('page_title')
Edit Category
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12 my-3">
            <a href="{{route("admin.categories.index")}}">
                <button class="btn btn-dark">Back</button>
            </a>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form id="edit" action="{{route("admin.categories.update", $category->id)}}"  method="POST">
                    @method('PUT')
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Title</label>
                            <div class="form-group">
                                <input type="text" value="{{$category->title}}" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <div class="form-group">
                                <textarea name="description" class="form-control">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 m-3 text-center">
                            <a href="{{route("admin.categories.index")}}">
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
{!! JsValidator::formRequest('App\Http\Requests\StoreCategoryRequest', '#edit'); !!}
@endsection