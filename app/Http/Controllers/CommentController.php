<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        Comment::create($validatedData);

        return back()->with('success', 'Comment posted successfully!');
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
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
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
