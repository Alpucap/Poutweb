@extends('layouts.profile-layout')

@section('content')
    <div class="profile-container">
        <img src="{{ asset('img/GUY.png') }}" alt="Profile Picture" class="profile-picture">
        <h1 class="profile-name">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</h1>
        <p class="profile-email">{{ Auth::check() ? Auth::user()->email : 'guest@example.com' }}</p>
        
        <div class="profile-actions">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Update Account</a>
            
            <form action="{{ route('profile.destroy') }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
            
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-secondary">Logout</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf  
            </form>
        </div>
    </div>
@endsection
