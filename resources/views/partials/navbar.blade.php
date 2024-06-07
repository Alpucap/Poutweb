<head>
    <link rel="stylesheet" href="{{ asset('css/nav-app.css') }}">
    <script src="{{ asset('js/nav-app.js') }}"></script>
</head>
<body>
    <nav>
        <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
        <a href="/renungan" class="{{ Request::is('renungan') ? 'active' : '' }}">Renungan</a>
        <a href="#" onclick="showalerts()" class="{{ Request::is('profile') ? 'active' : '' }}">
            <img src="img\POUT.png" alt="Profile">
        </a>
        <a href="#servant" class="{{ Request::is('servant') ? 'active' : '' }}">Servant</a>
        <a href="#counseling" class="{{ Request::is('counseling') ? 'active' : '' }}">Counseling</a>
    </nav>    
</body>