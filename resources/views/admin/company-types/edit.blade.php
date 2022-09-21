@extends('admin.layouts.app')
@section('title')
Edit Company Type
@endsection
@section('page_title')
Edit Company Type
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12 my-3">
            <a href="{{route("admin.company-types.index")}}">
                <button class="btn btn-dark">Back</button>
            </a>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <form id="edit" action="{{route("admin.company-types.update", $company_type->id)}}"  method="POST">
                    @method('PUT')
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Type Name</label>
                            <div class="form-group">
                                <input type="text" value="{{$company_type->name}}" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 m-3 text-center">
                            <a href="{{route("admin.company-types.index")}}">
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
{!! JsValidator::formRequest('App\Http\Requests\StoreCompanyTypeRequest', '#edit'); !!}
@endsection