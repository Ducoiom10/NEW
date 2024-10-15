<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('tieudetrang')</title>

    @include('client.layouts.partials.css')

</head>

<body>

    <main>
        <nav class="navbar navbar-expand-lg">
            @include('client.layouts.partials.nav')
        </nav>


        <header class="site-header d-flex flex-column justify-content-center align-items-center" >
            @include('client.layouts.partials.header')
        </header>

        @yield('content')

    </main>

    <footer class="site-footer">
        @include('client.layouts.partials.footer')
    </footer>
    @include('client.layouts.partials.js')
</body>

</html>
