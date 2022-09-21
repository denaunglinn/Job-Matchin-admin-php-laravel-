@extends('admin.layouts.app')
@section('title')
Create Sub Category
@endsection
@section('page_title')
Create Sub Category
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form id="create" action="{{route("admin.sub_categories.store")}}" method="post">
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select  name="category_id" id="category_id" class="form-control">
                                    <option value="">-- Please Choose --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                        <div class="col-md-12 m-3 text-center">
                            <a href="{{route("admin.sub_categories.index")}}">
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
{!! JsValidator::formRequest('App\Http\Requests\StoreSubCategoryRequest', '#create'); !!}
<script>
    $("#category_id").select2({
        allowClear: true,
        theme: 'bootstrap',
    });
</script>
@endsection
