document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed');

    // Function to filter Renungan items based on search input
    function searchRenungan() {
        var input = document.getElementById('searchInput').value.toLowerCase();
        var items = document.querySelectorAll('.Renungan-item');
        items.forEach(function(item) {
            var title = item.querySelector('h2').textContent.toLowerCase();
            if (title.includes(input)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Add event listener for input field
    document.getElementById('searchInput').addEventListener('input', searchRenungan);

    // Get the modal
    var modal = document.getElementById('editCommentModal');
    console.log('Modal:', modal);

    // Get the buttons that open the modal
    // Get the buttons that open the modal
    var editCommentBtns = document.querySelectorAll('.edit-comment');
    console.log('Buttons:', editCommentBtns);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    console.log('Close Button:', span);

    editCommentBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            // Get the comment ID
            var commentId = this.getAttribute('data-id');
    
            // Open the edit comment modal
            document.getElementById('editCommentModal').style.display = 'block';
    
            // Fetch the comment data and populate the form fields
            fetch('/comments/' + commentId + '/edit')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('editCommentId').value = data.id;
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editComment').value = data.comment;
                })
                .catch(error => console.error('Error fetching comment:', error));
        });
    });

    
    document.getElementById('editCommentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
    
        // Get the comment ID
        var commentId = document.getElementById('editCommentId').value;
    
        // Prepare form data
        var formData = new FormData(this);
    
        // Send a PUT request to update the comment
        fetch('/comments/' + commentId, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            return response.json();
        })
        .then(data => {
            // Update the comment in the DOM
            var commentElement = document.querySelector('.comment[data-id="' + commentId + '"]');
            commentElement.querySelector('strong').textContent = data.name;
            commentElement.querySelector('p:nth-of-type(2)').textContent = data.comment;
    
            // Close the edit comment modal
            document.getElementById('editCommentModal').style.display = 'none';
        })
        .catch(error => console.error('Error updating comment:', error));
    });

    // When the user clicks the button, open the modal
    editCommentBtns.forEach(function(btn) {
        btn.onclick = function() {
            console.log('Edit Button clicked');
            modal.style.display = "block";
            var commentId = this.getAttribute('data-id');
            console.log('Comment ID:', commentId);
            // Get the comment data and populate the form fields
            fetch('/comments/' + commentId + '/edit')
                .then(response => {
                    console.log('Fetch response:', response);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Data:', data);
                    document.getElementById('editCommentId').value = data.id;
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editComment').value = data.comment;
                })
                .catch(error => console.error('Error fetching comment:', error));
        }
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
