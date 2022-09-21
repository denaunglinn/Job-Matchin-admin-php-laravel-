<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header">
            <div class="header-top d-none d-md-block" style="background-color: #5271ff;">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <div class="header-info-left">
                                    <ul>
                                        <li>
                                            <img src="assets/img/icon/header_icon1.png" alt="" />34ºc, Sunny
                                        </li>
                                        <li>
                                        <img src="assets/img/icon/header_icon1.png" alt="" />{{date('D, d M, Y')}}
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="header-info-right float-right">
                                    <ul class="header-social">
                                        <li>
                                            <a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i> Sing In  </a>
                                        </li>
                                        <span class="text-white"> | </span>
                                        <li>
                                            <a href="details.html"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="details.html"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="details.html"><i class="fab fa-pinterest-p"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="index.html"><img width="200px" src="{{asset('images/logo1.png')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right">
                                <img width="100%" height="200px" src="{{asset('images/banner2.png')}}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.html"><img width="80px" src="{{asset('images/logo1.png')}}" alt="" /></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                @include('frontend.layouts.nav')
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="details.html">
                                        <input type="text" placeholder="Search" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>