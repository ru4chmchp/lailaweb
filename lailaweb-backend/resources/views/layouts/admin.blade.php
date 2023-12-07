<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminResource/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminResource/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminConfig/main/main.css') }}">
    <!-- Thay đổi đường dẫn (href) tới đường dẫn của hình ảnh favicon của bạn -->
    <link rel="icon" href="{{ asset('adminResource/dist/img/birdlogo.png') }}" type="image/x-icon">
    <!-- Box style -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.admin-layouts.header')
        @include('layouts.admin-layouts.sidebar')
        @yield('content')
        @include('layouts.admin-layouts.footer')

    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminResource/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminResource/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminResource/dist/js/adminlte.min.js') }}"></script>
    
    @yield('js')
</body>

</html>
