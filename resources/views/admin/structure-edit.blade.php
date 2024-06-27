@extends('layouts.admin-layout')

@section('title', 'Edit Structure')

@section('content')
    <h1>Edit Structure</h1>
    <div class="edit-form">
        <form method="POST" action="{{ route('admin.structure.update', $member->id) }}">
            @csrf
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" value="{{ $member->role }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $member->name }}" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo URL:</label>
                <input type="text" id="photo" name="photo" value="{{ $member->photo }}" required>
            </div>
            <div class="form-group">
                <label for="major">Major:</label>
                <input type="text" id="major" name="major" value="{{ $member->major }}" required>
            </div>
            <div class="form-group">
                <label for="batch">Batch:</label>
                <input type="text" id="batch" name="batch" value="{{ $member->batch }}" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
