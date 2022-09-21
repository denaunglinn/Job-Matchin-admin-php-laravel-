@extends('admin.layouts.app')
@section('title')
Admin Lists
@endsection
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Admin Lists</h3>

            <div class="card-tools">
                <form action="{{route('admin.lists.search')}}" method="post">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="list_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
            <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admin_list as $key => $list)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->phone}}</td>
                    <td>{{$list->address}}</td>
                    <td>{{$list->gender}}</td>
                    <td>
                        @if(auth()->user()->id != $list->id) 

                        <form action="{{route("admin.lists.destroy", $list->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="#">
                              <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                            </a>
                        </form>
                        @endif
                    </td>
                    </tr>
                @endforeach
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