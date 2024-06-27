<!-- resources/views/admin/birthday/edit.blade.php -->

@extends('layouts.admin-layout')

@section('title', 'Edit Birthday')

@section('content')
    <h1>Edit Birthday</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.birthday.update', $birthday->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $birthday->name }}" required>
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="{{ $birthday->jurusan }}" required>
        </div>

        <div class="form-group">
            <label for="angkatan">Angkatan:</label>
            <input type="text" id="angkatan" name="angkatan" value="{{ $birthday->angkatan }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $birthday->tanggal_lahir }}" required>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
