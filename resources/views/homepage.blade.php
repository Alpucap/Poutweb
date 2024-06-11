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
            <img src="img\Worship1.jpg" alt="">
            <div class="News-small">
                <img src="img\Worship2.jpg" alt="">
                <div class="News-tiny">
                    <img src="img\Worship1.jpg" alt="">
                    <img src="img\Worship2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="breaking-news-container2">
        <div class="breaking-news-marquee2">POUT NEWS</div>
    </div>
</div>

<!--Happy Birthday-->
<div class="happy">
    <h1>Happy Birthday to...</h1>
    <div class="happy-items">
        @php
            $currentMonth = now()->month; 
        @endphp
    
        @if($birthdays->isEmpty())
            <p>No birthdays found.</p>
        @else
            @foreach ($birthdays as $birthday)
                @php
                    $birthMonth = \Carbon\Carbon::parse($birthday->tanggal_lahir)->month;
                @endphp
                
                @if($birthMonth == $currentMonth)
                    <div class="happy-item">
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
                <h1>Chat with us?</h1>
                <button>Click here!</button>
            </div>
        </a>
    </div>
</div>

@endsection
