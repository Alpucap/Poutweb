<!DOCTYPE html>
<html>
<head>
    <title>POUT - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin-app.css') }}">
    <script src="{{ asset('js/admin-app.js') }}"></script>
    <link rel="icon" href="{{ asset('img\POUT.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('img\POUT.png') }}" type="image/x-icon"/>
</head>
<body>
    <div class="container">
        @include('partials.navbar')
        @yield('content')
    </div>
</body>
</html>
