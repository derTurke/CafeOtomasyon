<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('assets')}}/admin/images/favicon-32x32.png" type="image/png" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">
    <!--plugins-->
    <link href="{{asset('assets')}}/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('assets')}}/admin/css/pace.min.css" rel="stylesheet" />
    <script src="{{asset('assets')}}/admin/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets')}}/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/app.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/dark-theme.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/semi-dark.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/header-colors.css" />
    @yield('css')
    @yield('headerjs')
</head>
<body>
<div class="wrapper">

    @include('web._sidebar')

    @include('web._header')

    <div class="page-wrapper">
        <div class="page-content">
            @section('content')
                içerik alanı
            @show
        </div>
    </div>


</div>
@include('web._footer')
@yield('footerjs')
</body>
</html>
