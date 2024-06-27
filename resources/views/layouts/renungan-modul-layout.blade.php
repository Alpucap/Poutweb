<!DOCTYPE html>
<html>
<head>
    <title>POUT - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/renungan-modul-layout.css') }}">
    <script src="{{ asset('js/renungan-modul-layout.js') }}"></script>
    <link rel="icon" href="{{ asset('img\POUT.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('img\POUT.png') }}" type="image/x-icon"/>
</head>
<body>
    <div class="container">
        @include('partials.navbar')
        @include('partials.renungan-intro')
        @yield('content')
        @include('partials.footer')
    </div>
</body>
</html>
