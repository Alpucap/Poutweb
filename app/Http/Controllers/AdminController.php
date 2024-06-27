<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Birthday;
use App\Models\POUTStructure;
use App\Models\PdpjMember;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all members from the POUTStructure model
        $members = POUTStructure::all();

        // Fetch all birthdays
        $birthdays = Birthday::all();

        $pdPjMembers = PdpjMember::all();

        // Return the admin view with all necessary data
        return view('admin.index', compact('members', 'birthdays', 'pdPjMembers'));
    }

    // BIRTHDAY
    public function birthdayIndex()
    {
        // Fetch all birthdays
        $birthdays = Birthday::all();

        // Return the birthday index view with the birthdays data
        return view('admin.index', compact('birthdays'));
    }

    public function birthdayStore(Request $request)
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

            // Redirect with success message
            return redirect()->route('admin.index')->with('success', 'Birthday added successfully.');

        } catch (\Exception $e) {
            // Log error
            Log::error('Error creating birthday:', ['error' => $e->getMessage()]);
            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to add birthday.');
        }
    }

    public function birthdayEdit($id)
    {
        // Fetch the birthday by ID
        $birthday = Birthday::findOrFail($id);

        // Return the edit view with the birthday data
        return view('admin.birthday.edit', compact('birthday'));
    }

    public function birthdayUpdate(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        try {
            // Fetch the birthday by ID
            $birthday = Birthday::findOrFail($id);

            // Update the birthday data
            $birthday->update([
                'name' => $request->name,
                'jurusan' => $request->jurusan,
                'angkatan' => $request->angkatan,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);

            // Redirect with success message
            return redirect()->route('admin.index')->with('success', 'Birthday updated successfully.');

        } catch (\Exception $e) {
            // Log error
            Log::error('Error updating birthday:', ['error' => $e->getMessage()]);
            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to update birthday.');
        }
    }

    public function birthdayDestroy($id)
    {
        try {
            // Fetch the birthday by ID
            $birthday = Birthday::findOrFail($id);

            // Delete the birthday
            $birthday->delete();

            // Redirect with success message
            return redirect()->route('admin.index')->with('success', 'Birthday deleted successfully.');

        } catch (\Exception $e) {
            // Log error
            Log::error('Error deleting birthday:', ['error' => $e->getMessage()]);
            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to delete birthday.');
        }
    }

    // POUT Structure
    public function storeMember(Request $request)
    {
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

    public function edit($id)
    {
        // Fetch the member by ID
        $member = POUTStructure::findOrFail($id);

        // Return the edit view with the member data
        return view('admin.structure-edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'major' => 'required|string',
            'batch' => 'required|integer',
            'photo' => 'required|string',
        ]);

        try {
            // Fetch the member by ID
            $member = POUTStructure::findOrFail($id);

            // Update the member data
            $member->update([
                'role' => $request->role,
                'name' => $request->name,
                'major' => $request->major,
                'batch' => $request->batch,
                'photo' => $request->photo,
            ]);

            // Log info jika berhasil
            Log::info('Member updated:', $member->toArray());

            // Redirect dengan pesan sukses
            return redirect()->route('admin.index')->with('success', 'Member updated successfully.');

        } catch (\Exception $e) {
            // Tangkap kesalahan dan log pesan error
            Log::error('Error updating member:', ['error' => $e->getMessage()]);

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Failed to update member.');
        }
    }

    public function destroy($id)
    {
        try {
            // Fetch the member by ID
            $member = POUTStructure::findOrFail($id);

            // Delete the member
            $member->delete();

            // Log info jika berhasil
            Log::info('Member deleted:', $member->toArray());

            // Redirect dengan pesan sukses
            return redirect()->route('admin.index')->with('success', 'Member deleted successfully.');

        } catch (\Exception $e) {
            // Tangkap kesalahan dan log pesan error
            Log::error('Error deleting member:', ['error' => $e->getMessage()]);

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Failed to delete member.');
        }
    }

    //PDPJ
    public function storePdpjMember(Request $request)
    {
        // Validate input
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'major' => 'required|string',
            'batch' => 'required|string',
        ]);

        try {
            // Store PD PJ member (servants) data in the database
            PdpjMember::create([
                'role' => $request->role,
                'name' => $request->name,
                'major' => $request->major,
                'batch' => $request->batch,
            ]);

            // Redirect with success message
            return redirect()->route('admin.index')->with('success', 'PD PJ member added successfully.');

        } catch (\Exception $e) {
            // Log error
            Log::error('Error creating PD PJ member:', ['error' => $e->getMessage()]);
            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to add PD PJ member.');
        }
    }

    public function editPdpjMember($id)
    {
        // Fetch the PD PJ member by ID
        $pdPjMember = PdpjMember::findOrFail($id);

        // Return the edit view with the PD PJ member data
        return view('admin.pdpj.edit', compact('pdPjMember'));
    }

    public function updatePdpjMember(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'major' => 'required|string',
            'batch' => 'required|string',
        ]);

        try {
            // Fetch the PD PJ member by ID
            $pdPjMember = PdpjMember::findOrFail($id);

            // Update the PD PJ member data
            $pdPjMember->update([
                'role' => $request->role,
                'name' => $request->name,
                'major' => $request->major,
                'batch' => $request->batch,
            ]);

            // Redirect with success message
            return redirect()->route('admin.index')->with('success', 'PD PJ member updated successfully.');

        } catch (\Exception $e) {
            // Log error
            Log::error('Error updating PD PJ member:', ['error' => $e->getMessage()]);
            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to update PD PJ member.');
        }
    }

    public function destroyPdpjMember($id)
    {
        try {
            // Fetch the PD PJ member by ID and delete
            $pdPjMember = PdpjMember::findOrFail($id);
            $pdPjMember->delete();

            // Redirect with success message
            return redirect()->route('admin.index')->with('success', 'PD PJ member deleted successfully.');

        } catch (\Exception $e) {
            // Log error
            Log::error('Error deleting PD PJ member:', ['error' => $e->getMessage()]);
            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to delete PD PJ member.');
        }
    }

}
