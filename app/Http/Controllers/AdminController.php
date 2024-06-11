<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Birthday; // Assuming Birthday model is in the App\Models namespace

class AdminController extends Controller
{

    public function index()
    {
        return view('admin');
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        // Simpan data ke dalam database
        Birthday::create([
            'name' => $request->name,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect('/admin')->with('success', 'Birthday added successfully.');
    }
}
