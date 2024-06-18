@extends('layouts.admin-layout')

@section('title', 'Admin')

@section('content')
    <div class="birthday-form">
        <h2>Add Birthday</h2>
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" id="jurusan" name="jurusan" required>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan:</label>
                <input type="text" id="angkatan" name="angkatan" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="member-form">
        <h2>Add New Member</h2>
        <form method="POST" action="{{ route('admin.storeMember') }}">
            @csrf
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" id="jurusan" name="jurusan" required>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan:</label>
                <input type="text" id="angkatan" name="angkatan" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo URL:</label>
                <input type="text" id="photo" name="photo" required>
            </div>
            <button type="submit">Add Member</button>
        </form>
    </div>

    <div class="update-member-form">
        <h2>Update Member</h2>
        @foreach($members as $member)
            <div class="member">
                <h4>{{ $member->role }}</h4>
                <img src="{{ $member->photo }}" alt="{{ $member->name }}">
                <h3>{{ $member->name }}</h3>
                <p>{{ $member->jurusan }} | {{ $member->angkatan }}</p>
                <!-- Add edit button or link -->
                <a href="{{ route('admin.editMember', $member->id) }}">Edit</a>
            </div>
        @endforeach
    </div>
@endsection
