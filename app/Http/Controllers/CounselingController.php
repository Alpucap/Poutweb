<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Counseling;

class CounselingController extends Controller
{

    public function showForm()
    {
        return view('counseling');
    }

    public function submit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'topic' => 'required|string|max:1000',
        ]);

        // Get the current user
        $user = Auth::user();

        // Store the counseling topic
        Counseling::create([
            'user_id' => $user->id,
            'user_name' => $user->name, // Store the user's name
            'topic' => $request->input('topic'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your counseling topic has been submitted.');
    }
}
