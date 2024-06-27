@extends('layouts.renung')

@section('title', 'Renungan')

@section('content')
<div class="Renungan">
    <h1>Reflections</h1>
    <div class="Renungan-box">
        <div class="Renungan-items" id="renunganItemsContainer">
            <!-- Search input field -->
            <input type="text" id="searchInput" placeholder="Search Renungan items...">
            <?php foreach($renunganItems as $item): ?>
                <a href="<?php echo $item->link; ?>">
                    <div class="Renungan-item">
                        <h2><?php echo $item->title; ?></h2>
                        <p><?php echo $item->description; ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="Renungan-News">
            <?php foreach($newsItems as $news): ?>
                <div class="Renungan-News-item">
                    <img src="<?php echo $news->image; ?>" alt="<?php echo $news->title; ?>">
                    <h3><?php echo $news->title; ?></h3>
                    <p><?php echo $news->description; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>    
    <script>
            document.getElementById('searchInput').addEventListener('keyup', function() {
                var filter = this.value.toLowerCase();
                var items = document.getElementById('renunganItemsContainer').getElementsByClassName('Renungan-item');

                Array.prototype.forEach.call(items, function(item) {
                    var title = item.getElementsByTagName('h2')[0].textContent.toLowerCase();

                    if (title.includes(filter)) {
                        item.parentElement.style.display = '';
                    } else {
                        item.parentElement.style.display = 'none';
                    }
                });
            });
    </script>

    @if(Auth::check())
    <h1>Please Leave a Comment</h1>
    <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
        @csrf
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required>{{ old('comment') }}</textarea>
            @if($errors->has('comment'))
                <div class="error">{{ $errors->first('comment') }}</div>
            @endif
        </div>
        <button type="submit" class="submit-button">Post Comment</button>
    </form>
    @else
    <h1>Please Login First</h1>
    <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
        @csrf
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required>{{ old('comment') }}</textarea>
        </div>
        <button type="submit" class="submit-button">Login</button>
    </form>
    @endif

 
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
                <label for="editComment">Comment:</label>
                <textarea id="editComment" name="comment" required></textarea>
            </div>
            <button type="submit">Update Comment</button>
        </form>
    </div>
</div>

@include('loader')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('loader').style.display = 'none';
        
        // JavaScript to handle edit comment functionality
        document.querySelectorAll('.edit-comment').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.dataset.id;
                const commentText = document.querySelector(`.comment[data-id="${commentId}"] p:nth-of-type(2)`).textContent;
                
                document.getElementById('editCommentId').value = commentId;
                document.getElementById('editComment').value = commentText;
                
                // Update form action URL dynamically
                document.getElementById('editCommentForm').action = `/comments/${commentId}`;
                
                document.getElementById('editCommentModal').style.display = 'block';
            });
        });

        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('editCommentModal').style.display = 'none';
        });
    });
</script>

@endsection
