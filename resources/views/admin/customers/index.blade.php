@extends('admin.layouts.app')
@section('title')
Customer Lists
@endsection
@section('page_title')
Customer Lists
@endsection
@section('content')
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12 my-3">
            <a href="{{route("admin.customers.create")}}">
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
                  <th>Profile</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($customers as $key => $customer)
                  <tr>
                      <td>{{$key+1}}</td>
                      @if(isset($customer->photos[0]))
                        <td><img src="{{$customer->photos[0]->customer_photo_path()}}" width="80px" alt="profile_img"></td>
                        @else 
                        <td><img src="{{asset('images/no_file.svg')}}" width="80px" alt="no_file_img"></td>
                      @endif
                      <td>{{$customer->name}}</td>
                      <td>{{$customer->email}}</td>
                      <td>{{$customer->phone}}</td>
                      <td>{{$customer->address}}</td>
                      <td>{{$customer->gender}}</td>
                      <td> 
                        <div class="col-sm-2 m-2">
                          <a href="{{route("admin.customers.edit", $customer->id)}}">
                            <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          </a>
                        </div>
                        <div class="col-sm-2 m-2">
                          <form action="{{route("admin.customers.destroy", $customer->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="#">
                              <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                            </a>
                        </form>
                        </div>
                         
                      </td>
                      </tr>
                  @empty 
                  <tr><td colspan="7">There is no data !</td></tr>
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