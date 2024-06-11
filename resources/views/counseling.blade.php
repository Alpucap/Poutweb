@extends('layouts.counseling-layout')

@section('title', 'Counseling')

@section('content')
    <div class="counseling-container">
        <h1>Welcome to the Counseling Page, {{ Auth::check() ? Auth::user()->name : 'Guest' }}</h1>
        
        @if(Auth::check())
            <p>If you have any concerns or topics you would like to discuss, please fill out the form below:</p>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('counseling.submit') }}" method="POST" class="counseling-form">
                @csrf
                <div class="form-group">
                    <label for="topic">Counseling Topic</label>
                    <textarea id="topic" name="topic" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to submit your counseling topics.</p>
        @endif
    </div>
@endsection

