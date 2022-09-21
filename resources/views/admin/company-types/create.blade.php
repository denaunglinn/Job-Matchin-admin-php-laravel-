@extends('admin.layouts.app')
@section('title')
Create Company Type
@endsection
@section('page_title')
Create Company Type
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form id="create" action="{{route("admin.company-types.store")}}" method="post">
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Type Name</label>
                                <input type="text" id="title" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{route("admin.company-types.index")}}">
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
{!! JsValidator::formRequest('App\Http\Requests\StoreCompanyTypeRequest', '#create'); !!}
@endsection