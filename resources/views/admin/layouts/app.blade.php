<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>@yield("title")</title>
  <link href="{{asset('images/JM.png')}}"  rel="shortcut icon">

  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/select2-bootstrap.min.css')}}" />
  
  <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/backend.css')}}">

  <script src="{{asset('js/sweetalert2.min.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>

   <!-- Select2 -->
   <script src="{{asset('js/select2.min.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  @yield('extra_css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  @include('admin.layouts.header')

  <aside class="main-sidebar sidebar-white-primar ">
    <a href="#" class="brand-link text-center">
      <span class="brand-text text-primary font-weight-light"><h3>Job Match</h3></span>
    </a>
   @include('admin.layouts.sidebar')
  </aside>

  <div class="content-wrapper">
    <section class="content">
      <div class="container">
        <div class="row mt-4 ">
              <div class="col-12">
                <div class="app-page-title bg-light" >
                  <div>
                      @include('components.buttons.back_button')
                  </div>  
              </div>
              </div>
            @yield("content")
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

@yield('script')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
</body>
</html>
