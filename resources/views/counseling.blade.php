@extends('layouts.counseling-layout')

@section('title', 'Counseling')

@section('content')
    <div class="counseling-container">
        <h1>Hello, {{ Auth::check() ? Auth::user()->name : 'Guest' }}</h1>
        
        @if(Auth::check())
            <p>What would you like us to pray for?</p>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('counseling.submit') }}" method="POST" class="counseling-form">
                @csrf
                <div class="form-group">
                    <textarea id="topic" name="topic" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to submit your counseling.</p>
        @endif
    </div>

@include('loader')

<script>
    window.addEventListener('load', function() {
        document.getElementById('loader').style.display = 'none';
    });
</script>

@endsection

