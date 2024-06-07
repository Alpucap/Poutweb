<!DOCTYPE html>
<html>
<head>
    <title>POUT - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/homepage-app.css') }}">
    <script src="{{ asset('js/carousel.js') }}"></script>
</head>
<body>
    <div class="container">
        @include('partials.navbar')
        @yield('content')
        @include('partials.footer')
    </div>
</body>
</html>
