@extends('layouts.home')

@section('title', 'Home Page')

@section('content')
<!--Intro-->
<div class="intro" id="intros">
    <div class="intro-item">
        <div class="intro-fonts">
            <h1>Persekutuan Oikumene Universitas Tarumanagara</h1>
            <h2>Christian Organization at Tarumanagara University</h2>
        </div>
        <video autoplay loop muted>
            <source src="video\Church.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>

<!-- INFINITE -->
<div class="Infinite">
    <div class="slideshow-container">
        <div class="slide"><a href="/Shop">PRAY</a></div>
        <div class="slide"><a href="/Shop">PRAISE</a></div>
        <div class="slide"><a href="/Shop">WORSHIP</a></div>
    </div>
</div>

<!--About-->
<div class="about" id="abouts">
    <div class="about-item">
        <h1>What is POUT?</h1>
        <p>Persekutuan Oikumene Universitas Tarumanagara (POUT) is an organization that operates in the field of Christian religion. 
        POUT is interdenominational, which means that POUT is not tied to a single group or specific denomination, 
        but rather consists of several groups. In POUT, we can get to know each other, share with each other, grow in God, and most importantly, 
        we praise and worship God together.</p>
    </div>
    <div class="about-event">
        <h1>Events</h1>
        <div class="event-items">
            @include('partials.eventCarousel')
        </div>
    </div>
</div>

<!--News-->
<div class="News">
    <div class="breaking-news-container">
        <div class="breaking-news-marquee">POUT NEWS</div>
    </div>
    <div class="News-items">
        <div class="News-big">
            <img src="img\News-POUT.png" alt="">
            <button class="join-button">
                <span class="join-text">CONTACT US</span>
            </button>
            <div class="News-small">
                <img src="img\Worship2.jpg" alt="">
                <div class="News-tiny">
                    <img src="img\News-PD.png" alt="">
                    <img src="img\News-PJ.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="breaking-news-container2">
        <div class="breaking-news-marquee2">POUT NEWS</div>
    </div>
</div>

<!--Birthday-->
<div class="happy">
    <h1>Happy Birthday to...</h1>
    <div class="happy-attribute">
        <div class="happy-filter">
            <label for="jurusan-select">Filter by Jurusan:</label>
            <select id="jurusan-select">
                <option value="all">All</option>
                <option value="FEB">FEB</option>
                <option value="FTI">FTI</option>
                <option value="FPsi">FPsi</option>
                <option value="FT">FT</option>
                <option value="FK">FK</option>
                <option value="FH">FH</option>
                <option value="FSRD">FSRD</option>
                <option value="FIK">FIK</option>
            </select>
        </div>
        <form method="get">
            <input type="hidden" name="sort" value="name">
            <button type="submit">Sort by Name &#9650;</button>
        </form>
        <form method="get">
            <input type="hidden" name="sort" value="name_desc">
            <button type="submit">Sort by Name &#9660;</button>
        </form>
    </div>
    <div class="happy-items">
        @php
            $currentMonth = now()->month; 
           
            // Determine sorting order based on 'sort' parameter
            if (request()->has('sort')) {
                $sortOrder = request()->get('sort');
                if ($sortOrder == 'name_desc') {
                    $birthdays = $birthdays->sortByDesc('name');
                } else {
                    $birthdays = $birthdays->sortBy('name');
                }
            }
        @endphp
    
        @if($birthdays->isEmpty())
            <p>No birthdays found.</p>
        @else
            @foreach ($birthdays as $birthday)
                @php
                    $birthMonth = \Carbon\Carbon::parse($birthday->tanggal_lahir)->month;
                @endphp
                
                @if($birthMonth == $currentMonth)
                    <div class="happy-item" data-jurusan="{{ $birthday->jurusan }}">
                        <h3>{{ $birthday->name }}</h3>
                        <p>{{ $birthday->jurusan }} {{ $birthday->angkatan }} | {{ \Carbon\Carbon::parse($birthday->tanggal_lahir)->format('F d') }}</p>
                    </div>
                @endif
            @endforeach
        @endif
    </div>    
</div>


<!--Counseling -->
<div class="counseling">
    <div class="counseling-item">
        <a href="{{ route('counseling') }}">
            <img src="img\Worship1.jpg" alt="">
            <div class="text-overlay">
                <h1>Do you need help?</h1>
                <button>Contact Us!</button>
            </div>
        </a>
    </div>
</div>

@include('loader')

@endsection
