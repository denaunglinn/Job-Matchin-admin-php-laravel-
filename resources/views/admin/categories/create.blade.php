@extends('admin.layouts.app')
@section('title')
Create Category
@endsection
@section('page_title')
Create Category
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form id="create" action="{{route("admin.categories.store")}}" method="post">
                    @csrf 
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" id="title" name="title" class="form-control">
                          </div>
                      </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{route("admin.categories.index")}}">
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
@endsection