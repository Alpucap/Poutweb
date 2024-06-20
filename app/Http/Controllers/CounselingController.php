<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Counseling;

class CounselingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $history = $user ? Counseling::where('user_id', $user->id)->orderBy('created_at', 'desc')->get() : collect();
        
        return view('counseling', compact('history'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:1000',
        ]);

        $user = Auth::user();

        Counseling::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'topic' => $request->input('topic'),
        ]);

        return redirect()->back()->with('success', 'Your counseling topic has been submitted.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'topic' => 'required|string|max:1000',
        ]);

        $counseling = Counseling::findOrFail($id);

        if (Auth::id() != $counseling->user_id) {
            return redirect()->route('counseling')->with('error', 'Unauthorized access.');
        }

        $counseling->update([
            'topic' => $request->input('topic'),
        ]);

        return redirect()->route('counseling')->with('success', 'Your counseling topic has been updated.');
    }

    public function delete($id)
    {
        $counseling = Counseling::findOrFail($id);

        if (Auth::id() != $counseling->user_id) {
            return redirect()->route('counseling')->with('error', 'Unauthorized access.');
        }

        $counseling->delete();

        return redirect()->route('counseling')->with('success', 'Your counseling topic has been deleted.');
    }
}

