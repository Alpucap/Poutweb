<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Birthday;
use App\Models\POUTStructure; // Assuming POUTStructure model is in the App\Models namespace

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all members from the POUTStructure model
        $members = POUTStructure::all();

        // Return the admin view with the members data
        return view('admin.index', compact('members'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        // Store birthday data in the database
        Birthday::create([
            'name' => $request->name,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect('/admin')->with('success', 'Birthday added successfully.');
    }

    public function storeMember(Request $request)
    {
        // Validate input
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'photo' => 'required|url',
        ]);

        // Store member data in the POUTStructure model
        POUTStructure::create([
            'role' => $request->role,
            'name' => $request->name,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'photo' => $request->photo,
        ]);

        return redirect()->back()->with('success', 'Member added successfully.');
    }

    public function editMember($id)
    {
        // Fetch member details from the database
        $member = POUTStructure::findOrFail($id);

        // Return view with member data for editing
        return view('admin.edit-member', compact('member'));
    }

    public function updateMember(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'photo' => 'required|url',
        ]);

        // Find the member by ID
        $member = POUTStructure::findOrFail($id);

        // Update member data
        $member->update([
            'role' => $request->role,
            'name' => $request->name,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'photo' => $request->photo,
        ]);

        return redirect()->back()->with('success', 'Member updated successfully.');
    }
}
