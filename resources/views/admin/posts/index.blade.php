@extends('admin.layouts.app')
@section('title')
Post Lists
@endsection
@section('page_title')
 Post Lists
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12 my-3">
          <a href="{{route("admin.posts.create")}}">
            <button class="btn btn-info"><i class="fa fa-plus"></i></button>
          </a>
      </div>
        <div class="col-12">
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
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($posts as $key => $post)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><img src="{{$post->photos[0]->photo_path()}}" width="80px" alt=""></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category ? $post->category->title : '-'}}</td>
                        <td>{{$post->category->sub_category ? $post->category->sub_category->title : '-'}}</td>
                        <td> {{ substr(strip_tags($post->description), 0, 40) }}</td>
                        <td>
                          <div class="row justify-content-center">
                            <div class="col-sm-2 mr-3">
                              <a href="{{route("admin.posts.edit", $post->id)}}">
                              <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                             </a>
                            </div>
                            <div class="col-sm-2">
                              <form action="{{route("admin.posts.destroy",['post' => $post->id])}}" method="post">
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
                        <td colspan="7" class="text-center">
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