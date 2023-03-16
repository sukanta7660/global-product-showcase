<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@hasSection('title') @yield('title') || @endif{{ config('site.siteTitle') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('admin-assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin-assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/jquery.dataTables.css') }}">
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/custom.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>

<!-- ======= Header ======= -->
@include('layouts.partial.admin.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('layouts.partial.admin.sidebar')
<!-- End Sidebar-->

<main id="main" class="main">

    @yield('content')

    @yield('box')

</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
@include('layouts.partial.admin.footer')
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<script src="{{ asset('admin-assets/js/jquery/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('admin-assets/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin-assets/js/main.js') }}"></script>
<script>
    $(function () {
        new DataTable('#dataTable');
    });
</script>
@stack('js')
</body>

</html>
