@extends('layouts.profile-layout')
@section('title', 'Profile')
@section('content')
    <div class="profile-container">
        <img src="{{ asset('img/GUY.png') }}" alt="Profile Picture" class="profile-picture">
        <h1 class="profile-name">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</h1>
        <p class="profile-email">{{ Auth::check() ? Auth::user()->email : 'guest@example.com' }}</p>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="profile-actions">
            @if (Auth::check() && Auth::user()->email == 'alpucaps@gmail.com')
                <a href="/admin" class="btn btn-admin">Admin Page</a>
            @endif
            <a href="#" id="editProfileBtn" class="btn btn-primary">Update Account</a>
            
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

        <!-- Edit Profile Form -->
        <div id="editProfileForm" style="display: none;">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" class="form-control" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="form-control" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="#" id="cancelEditBtn" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

    @include('loader')

    <script>
        window.addEventListener('load', function() {
            document.getElementById('loader').style.display = 'none';
        });

        document.getElementById('editProfileBtn').addEventListener('click', function() {
            document.querySelector('.profile-actions').style.display = 'none';
            document.getElementById('editProfileForm').style.display = 'block';
        });

        document.getElementById('cancelEditBtn').addEventListener('click', function() {
            document.getElementById('editProfileForm').style.display = 'none';
            document.querySelector('.profile-actions').style.display = 'block';
        });
    </script>
@endsection
