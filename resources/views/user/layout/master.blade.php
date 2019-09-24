<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Seldom-POS') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('user.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('user.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div id="app" class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('user.includes.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/toastr.min.js') }}"></script>

    <script>
        toastr.options.toastClass = 'toastr';
        toastr.options.progressBar = true;
        @if (Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    </script>

    @yield('datatable')
</body>

</html>
