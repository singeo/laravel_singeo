<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <!-- Title -->
    <title>@yield('web_title')</title>
    <meta name="description" content="后台管理系统"/>
    <meta name="keywords" content="后台管理系统"/>
    <meta name="author" content="singeo"/>
    @include('admin.common.header_css')
    @yield('style')
</head>
<body class="page-header-fixed">
<div class="overlay"></div>
<main class="page-content content-wrap">
    <!-- Navbar -->
    @include('admin.common.navbar')
    <!-- Navbar -->
    @include('admin.common.sidebar')
    <div class="page-inner">
        @yield('main')
        <div class="page-footer">
            <p class="no-s">2019 &copy; dev.singeo.com</p>
        </div>
    </div><!-- Page Inner -->
</main>
<div class="cd-overlay"></div>
@include('admin.common.footer_js')
@yield('script')
</body>
</html>