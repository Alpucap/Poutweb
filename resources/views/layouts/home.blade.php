<!DOCTYPE html>
<html>
<head>
    <title>POUT - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/homepage-app.css') }}">
    <script src="{{ asset('js/homepage-app.js') }}"></script>
    <link rel="icon" href="{{ asset('img\POUT.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('img\POUT.png') }}" type="image/x-icon"/>
</head>
<body>
    <div class="container">
        @include('partials.navbar')
        @yield('content')
        @include('partials.footer')
    </div>
</body>
</html>
