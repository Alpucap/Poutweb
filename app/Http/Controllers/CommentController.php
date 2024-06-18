<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Create a new comment instance and save it
        $comment = new Comment();
        $comment->name = Auth::user()->name;  // Automatically assign the authenticated user's name
        $comment->comment = $request->comment;
        $comment->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment posted successfully!');
    }

    public function edit($id)
    {
        // Retrieve the comment by its ID
        $comment = Comment::findOrFail($id);

        // Return view for editing the comment
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Find the comment by its ID
        $comment = Comment::findOrFail($id);

        // Update the comment with the validated data
        $comment->update($validatedData);

        // Redirect back with success message
        return back()->with('success', 'Comment updated successfully!');
    }

    public function destroy($id)
    {
        // Find the comment by its ID and delete it
        Comment::findOrFail($id)->delete();

        // Redirect back with success message
        return back()->with('success', 'Comment deleted successfully!');
    }
}
