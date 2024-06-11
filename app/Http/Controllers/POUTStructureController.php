<?php
namespace App\Http\Controllers;

use App\Models\POUTStructure;

class POUTStructureController extends Controller
{
    public function index()
    {
        try {
            \DB::enableQueryLog();

            $structures = POUTStructure::orderBy('role', 'asc')->get();
            
            // dd(\DB::getQueryLog());

            dd($structures);

            $sortedStructures = $this->sortStructures($structures);

            return view('servant', compact('sortedStructures'));
        } catch (\Exception $e) {
            \Log::error('Error fetching data from POUTStructure: ' . $e->getMessage());
            return response()->view('error', [], 500); // 500 is the HTTP status code for internal server error
        }
    }


    private function sortStructures($structures)
    {
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

        foreach ($structures as $structure) {
            $sorted[$structure->role][] = $structure;
        }

        return $sorted;
    }
}
