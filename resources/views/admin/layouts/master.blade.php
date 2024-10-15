<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('tieudetrang')</title>

    @include('admin.layouts.partials.css')

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            @include('admin.layouts.partials.nav')
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                @include('admin.layouts.partials.header')
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

        <footer class="site-footer">
            {{-- @include('admin.layouts.partials.footer') --}}
        </footer>
        @include('admin.layouts.partials.js')
</body>

</html>
