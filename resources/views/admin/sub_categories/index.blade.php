@extends('admin.layouts.app')
@section('title')
Sub Category Lists
@endsection
@section('page_title')
Sub Category Lists
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12 my-3">
            <a href="{{route("admin.sub_categories.create")}}">
              <button class="btn btn-info"><i class="fa fa-plus"></i></button>
            </a>
        </div>
        <div class="col-12 text-muted">
          <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap text-center">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($categories as $key => $category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->category->title}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                          <div class="row justify-content-center">
                            <div class="col-sm-2">
                              <a href="{{route("admin.sub_categories.edit", $category->id)}}">
                                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                            </a>
                            </div>
                            <div class="col-sm-2">
                              <form action="{{route("admin.sub_categories.destroy",['sub_category' => $category->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="#">
                                  <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                                </a>
                              </form>
                            </div>
                          </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="4" class="text-center">
                            <p>There is no data !</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div>
@endsection
@section('script')
<script>

  
</script>
@endsection