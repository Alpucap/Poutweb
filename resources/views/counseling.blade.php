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
            
            <h2>Your Counseling History</h2>
            <div class="history-container">
                @if($history->isEmpty())
                    <p>No counseling topics found.</p>
                @else
                    <ul class="history-list">
                        @foreach($history as $item)
                            <li>
                                <p><strong>Date:</strong> {{ $item->created_at->format('d-m-Y') }}</p>
                                <p><strong>Topic:</strong> {{ $item->topic }}</p>
                                <button class="btn btn-secondary btn-sm edit-button" data-id="{{ $item->id }}" data-topic="{{ $item->topic }}">Edit</button>
                                <form action="{{ route('counseling.delete', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Are you sure you want to delete this counseling topic?')">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to submit your counseling.</p>
        @endif
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea id="editTopic" name="topic" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@include('loader')

<script>
    window.addEventListener('load', function() {
        document.getElementById('loader').style.display = 'none';
    });

    $(document).ready(function() {
        $('.edit-button').on('click', function() {
            var id = $(this).data('id');
            var topic = $(this).data('topic');
            $('#editTopic').val(topic);
            $('#editForm').attr('action', '/counseling/' + id + '/update');
            $('#editModal').modal('show');
        });
    });
</script>

@endsection
