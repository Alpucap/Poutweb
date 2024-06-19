<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Birthday;
use App\Models\POUTStructure;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all members from the POUTStructure model
        $members = POUTStructure::all();

        // Return the admin view with the members data
        return view('admin.index', compact('members'));
    }

    // BIRTHDAY
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        try {
            // Store birthday data in the database
            Birthday::create([
                'name' => $request->name,
                'jurusan' => $request->jurusan,
                'angkatan' => $request->angkatan,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating birthday:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to add birthday.');
        }

        return redirect('/admin')->with('success', 'Birthday added successfully.');
    }

    // POUT Structure
    public function storeMember(Request $request)
    {
        dd($request->all());
        // Validate input
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'major' => 'required|string',
            'batch' => 'required|integer',
            'photo' => 'required|string',
        ]);        

        try {
            // Proses simpan data ke dalam model
            $member = POUTStructure::create([
                'role' => $request->role,
                'name' => $request->name,
                'major' => $request->major,
                'batch' => $request->batch,
                'photo' => $request->photo,
            ]);
            
        
            // Log info jika berhasil
            Log::info('Member created:', $member->toArray());
        
            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Member added successfully.');
        
        } catch (\Exception $e) {
            // Tangkap kesalahan dan log pesan error
            Log::error('Error creating member:', ['error' => $e->getMessage()]);
        
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Failed to add member.');
        }
        
    }
}
