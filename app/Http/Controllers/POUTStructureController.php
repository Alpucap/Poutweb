<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\POUTStructure;
use Illuminate\Support\Facades\Log;

class POUTStructureController extends Controller
{
    public function index()
    {
        try {
            // Enable query logging
            DB::enableQueryLog();

            // Fetch structures ordered by role using raw SQL
            $structures = DB::select("SELECT * FROM POUTStructure ORDER BY role ASC");

            // Sort fetched structures
            $sortedStructures = $this->sortStructures($structures);

            // Return view with sorted structures
            return view('servant', compact('sortedStructures'));

        } catch (\Exception $e) {
            // Log error message with detailed exception
            Log::error('Error fetching data from POUTStructure: ' . $e->getMessage());

            // Return an error response view with HTTP status code 500 (Internal Server Error)
            return response()->view('error', [], 500);
        }
    }

    private function sortStructures($structures)
    {
        // Define sorting categories
        $sorted = [
            'Ketum' => [],
            'Waketum' => [],
            'Koor Divisi Doa & Pemerhati' => [],
            'WaKoor Divisi Doa & Pemerhati' => [],
            'Koor Divisi Acara' => [],
            'WaKoor Divisi Acara' => [],
            'Koor Divisi Publikasi & Dokumentasi' => [],
            'WaKoor Divisi Publikasi & Dokumentasi' => [],
            'Koor Divisi Kelompok Kecil' => [],
            'WaKoor Divisi Kelompok Kecil' => [],
            'Koor Divisi Praise & Worship' => [],
            'WaKoor Divisi Praise & Worship' => [],
            'Anggota Divisi Doa & Pemerhati' => [],
            'Anggota Divisi Acara' => [],
            'Anggota Divisi Publikasi & Dokumentasi' => [],
            'Anggota Divisi Kelompok Kecil' => [],
            'Anggota Divisi Praise & Worship' => [],
        ];

        // Populate sorted array based on structure role
        foreach ($structures as $structure) {
            $sorted[$structure->role][] = $structure;
        }

        return $sorted;
    }
}
