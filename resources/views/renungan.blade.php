@extends('layouts.renung')

@section('title', 'Renungan')

@section('content')
<div class="Renungan">
    <h1>Renungan</h1>
    <div class="Renungan-box">
        <div class="Renungan-items">
            <!-- Search input field -->
            <input type="text" id="searchInput" placeholder="Search Renungan items...">
            @foreach($renunganItems as $item)
                <a href="{{ $item->link }}">
                    <div class="Renungan-item">
                        <h2>{{ $item->title }}</h2>
                        <p>{{ $item->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="Renungan-News">
            @foreach($newsItems as $news)
                <div class="Renungan-News-item">
                    <img src="{{ $news->image }}" alt="{{ $news->title }}">
                    <h3>{{ $news->title }}</h3>
                    <p>{{ $news->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <h1>Please Leave a Comment</h1>
    <!-- Display comments -->
    <div class="comments">
        @foreach($comments as $comment)
            <div class="comment" data-id="{{ $comment->id }}">
                <p><strong>{{ $comment->name }}</strong> ({{ $comment->created_at }})</p>
                <p>{{ $comment->comment }}</p>
                <!-- Edit button (opens pop-up window) -->
                <button class="btn btn-primary edit-comment" data-id="{{ $comment->id }}">Edit</button>
                
                <!-- Delete button -->
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    <!-- Comment form -->
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required></textarea>
        </div>
        <button type="submit">Post Comment</button>
    </form>
</div>

<!-- Edit comment modal -->
<div id="editCommentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Comment</h2>
        <form id="editCommentForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editCommentId" name="id">
            <div>
                <label for="editName">Name:</label>
                <input type="text" id="editName" name="name" required>
            </div>
            <div>
                <label for="editComment">Comment:</label>
                <textarea id="editComment" name="comment" required></textarea>
            </div>
            <button type="submit">Update Comment</button>
        </form>
    </div>
</div>

@endsection

