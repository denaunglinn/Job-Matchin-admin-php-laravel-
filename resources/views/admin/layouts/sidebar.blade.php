<style>
.userbox .fa {
  background-color: rgba(110, 129, 220, 0.1);
  padding: 7px 10px 11px;
  color: #7eb4f2;
  border-radius: 50%;
}
</style>
<div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <div class="profilebar text-center">
            <img src="{{asset('images/admin_1.png')}}" width="20%" class="img-fluid" alt="profile">
            <div class="profilename mt-2">
              <h5>{{auth()->user()->name}}</h5>
              <p class="text-muted"><i class="fa fa-circle text-success fa-xs"></i> Admin</p>
            </div>
            <div class="userbox">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="{{route("admin.dashboard")}}" class="profile-icon"><i class="fa fa-user"  alt="user"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="profile-icon"><i class="fa fa-envelope" alt="email"></i></a></li>
                    <li class="list-inline-item">
                      <a href="#" class="profile-icon" alt="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt" alt="logout"></i>
                      </a>
                    <form id="logout-form" action="{{route("logout")}}" method="post" style="display: none">               
                      @csrf
                    </form>                    
                </ul>
              </div>
        </div>
        </li>
        <li class="nav-item text-muted ml-2 mt-3">Main</li>

        <li class="nav-item">
           <a href="{{route("admin.categories.index")}}" class="nav-link">
            <i class="fa fa-clipboard-list ms-5"></i>
            <p>
               Category
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route("admin.sub_categories.index")}}" class="nav-link">
            <i class="fa fa-clipboard-list ms-5"></i>
            <p>
              Sub Category
           </p>
         </a>
       </li>

      <li class="nav-item">
        <a href="{{route("admin.company-types.index")}}" class="nav-link">
          <i class="fa fa-building ms-5"></i>
          <p>
              Company Type
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route("admin.companies.index")}}" class="nav-link">
          <i class="fa fa-building ms-5"></i>
          <p>
            Company List
          </p>
        </a>
      </li>

       <li class="nav-item">
          <a href="{{route("admin.posts.index")}}" class="nav-link">
          <i class="fas fa-book"></i>
            <p>
              Post
            </p>
          </a>
        </li>

        {{-- <li class="nav-item">
          <a href="{{route("admin.trend-posts.index")}}" class="nav-link">
            <i class="fas fa-book"></i>
            <p>
              Trend Post
            </p>
          </a>
        </li> --}}

        <li class="nav-item text-muted ml-2 mt-3">Customer</li>

        <li class="nav-item">
          <a href="{{route("admin.customers.index")}}" class="nav-link">
            <i class="fas fa-users ms-5"></i>
            <p>
              Customer List
            </p>
          </a>
        </li>

        <li class="nav-item text-muted ml-2 mt-3">Admin</li>

        <li class="nav-item">
          <a href="{{route("admin.lists.index")}}" class="nav-link">
            <i class="fas fa-users ms-5"></i>
            <p>
              Admin List
            </p>
          </a>
        </li>
      </ul>
    </nav>
</div>