{{-- resources/views/admin/pdpj/edit.blade.php --}}

@extends('layouts.admin-layout')

@section('title', 'Edit PD PJ Member')

@section('content')
    <h1>Edit PD PJ Member</h1>

    {{-- Flash messages --}}
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

    <form method="POST" action="{{ route('admin.pdpj.update', $pdPjMember->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="{{ $pdPjMember->role }}" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $pdPjMember->name }}" required>
        </div>
        <div class="form-group">
            <label for="major">Major:</label>
            <input type="text" id="major" name="major" value="{{ $pdPjMember->major }}" required>
        </div>
        <div class="form-group">
            <label for="batch">Batch:</label>
            <input type="text" id="batch" name="batch" value="{{ $pdPjMember->batch }}" required>
        </div>

        <button type="submit">Update Member</button>
    </form>
@endsection
