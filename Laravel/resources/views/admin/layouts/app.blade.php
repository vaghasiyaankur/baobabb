<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Pichforest" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    @stack('styles_before_assets')
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon-css/flag-icon.min.css') }}">

    @stack('styles_after_assets')
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <input type="hidden" name="base_url" id="base_url" value="{{ URL::to('/') }}">
        @include('admin.layouts.partials._header')
        @include('admin.layouts.partials._sidebar')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('content')
            </div>
            <!-- End Page-content -->
            @include('admin.layouts.partials._footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('admin.layouts.partials._rightbar')
    <script>
        var base_url = $('#base_url').val();
    </script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/app.js') }}"></script> -->
    
    @stack('script')
</body>
</html>
