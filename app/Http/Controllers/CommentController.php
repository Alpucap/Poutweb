<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    // Function to filter inappropriate words
    private function containsBadWords($comment)
    {
        $badWords = config('badwords.words');
        foreach ($badWords as $badWord) {
            if (stripos($comment, $badWord) !== false) {
                return true;
            }
        }
        return false;
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        if ($this->containsBadWords($request->comment)) {
            return redirect()->back()->withErrors(['comment' => 'Your comment contains inappropriate language.']);
        }

        $comment = new Comment();
        $comment->name = Auth::user()->name;  // Automatically assign the authenticated user's name
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        if ($this->containsBadWords($validatedData['comment'])) {
            return redirect()->back()->withErrors(['comment' => 'Your comment contains inappropriate language.']);
        }

        $comment = Comment::findOrFail($id);
        $comment->update($validatedData);

        return redirect()->back()->with('success', 'Comment updated successfully!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
