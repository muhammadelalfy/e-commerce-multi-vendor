 <!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} | @yield('page_name' , 'Home')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo asset('plugins/fontawesome-free/css/all.min.css')  ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo asset('dist/css/adminlte.min.css')  ?>">
{{--    @stack('css')--}}
    @vite(['resources/css/app.css'])

</head>
<body class="hold-transition sidebar-mini" id="app">
{{--<App />--}}

<div class="wrapper" >

    @include('layouts.partials.navbar');

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->
       <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title' , 'starter')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    @section('breadcrumb')
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    @show
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
       @yield('content')
        <!-- /.content -->
    </div>

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
@include('layouts.partials.sidebar')
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
@stack('script')
<script>
    const userId = "{{auth()->id()}}"
</script>
@vite('resources/js/app.js')
</body>
</html>
