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
@endsection
