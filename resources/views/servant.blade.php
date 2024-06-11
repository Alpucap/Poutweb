@extends('layouts.servant-layout')

@section('title', 'servant')

@section('content')
    <div class="Servants">
        <h1>Let's get to know the organizational structure at POUT</h1>
        <div class="Servants-item">
            <div class="KetumWaketum">
                <h2>KETUM & WAKETUM</h2>
                @foreach($sortedStructures['Ketum'] as $ketum)
                    <div class="member">
                        <img src="{{ $ketum->photo }}" alt="{{ $ketum->name }}">
                        <h3>{{ $ketum->name }}</h3>
                        <p>Jurusan: {{ $ketum->major }}</p>
                        <p>Angkatan: {{ $ketum->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Waketum'] as $waketum)
                    <div class="member">
                        <img src="{{ $waketum->photo }}" alt="{{ $waketum->name }}">
                        <h3>{{ $waketum->name }}</h3>
                        <p>Jurusan: {{ $waketum->major }}</p>
                        <p>Angkatan: {{ $waketum->batch }}</p>
                    </div>
                @endforeach
            </div>
            <div class="BPHI">
                <h2>BPHI</h2>
                @foreach($sortedStructures['Koor Divisi Doa & Pemerhati'] as $koorDoa)
                    <div class="member">
                        <img src="{{ $koorDoa->photo }}" alt="{{ $koorDoa->name }}">
                        <h3>{{ $koorDoa->name }}</h3>
                        <p>Jurusan: {{ $koorDoa->major }}</p>
                        <p>Angkatan: {{ $koorDoa->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Koor Divisi Acara'] as $koorAcara)
                    <div class="member">
                        <img src="{{ $koorAcara->photo }}" alt="{{ $koorAcara->name }}">
                        <h3>{{ $koorAcara->name }}</h3>
                        <p>Jurusan: {{ $koorAcara->major }}</p>
                        <p>Angkatan: {{ $koorAcara->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Koor Divisi Publikasi & Dokumentasi'] as $koorPubDok)
                    <div class="member">
                        <img src="{{ $koorPubDok->photo }}" alt="{{ $koorPubDok->name }}">
                        <h3>{{ $koorPubDok->name }}</h3>
                        <p>Jurusan: {{ $koorPubDok->major }}</p>
                        <p>Angkatan: {{ $koorPubDok->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Koor Divisi Kelompok Kecil'] as $koorKelKecil)
                    <div class="member">
                        <img src="{{ $koorKelKecil->photo }}" alt="{{ $koorKelKecil->name }}">
                        <h3>{{ $koorKelKecil->name }}</h3>
                        <p>Jurusan: {{ $koorKelKecil->major }}</p>
                        <p>Angkatan: {{ $koorKelKecil->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Koor Divisi Praise & Worship'] as $koorPW)
                    <div class="member">
                        <img src="{{ $koorPW->photo }}" alt="{{ $koorPW->name }}">
                        <h3>{{ $koorPW->name }}</h3>
                        <p>Jurusan: {{ $koorPW->major }}</p>
                        <p>Angkatan: {{ $koorPW->batch }}</p>
                    </div>
                @endforeach
            </div>
            <div class="BPH">
                <h2>BPH</h2>
                @foreach($sortedStructures['WaKoor Divisi Doa & Pemerhati'] as $waKoorDoa)
                    <div class="member">
                        <img src="{{ $waKoorDoa->photo }}" alt="{{ $waKoorDoa->name }}">
                        <h3>{{ $waKoorDoa->name }}</h3>
                        <p>Jurusan: {{ $waKoorDoa->major }}</p>
                        <p>Angkatan: {{ $waKoorDoa->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['WaKoor Divisi Acara'] as $waKoorAcara)
                    <div class="member">
                        <img src="{{ $waKoorAcara->photo }}" alt="{{ $waKoorAcara->name }}">
                        <h3>{{ $waKoorAcara->name }}</h3>
                        <p>Jurusan: {{ $waKoorAcara->major }}</p>
                        <p>Angkatan: {{ $waKoorAcara->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['WaKoor Divisi Publikasi & Dokumentasi'] as $waKoorPubDok)
                    <div class="member">
                        <img src="{{ $waKoorPubDok->photo }}" alt="{{ $waKoorPubDok->name }}">
                        <h3>{{ $waKoorPubDok->name }}</h3>
                        <p>Jurusan: {{ $waKoorPubDok->major }}</p>
                        <p>Angkatan: {{ $waKoorPubDok->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['WaKoor Divisi Kelompok Kecil'] as $waKoorKelKecil)
                    <div class="member">
                        <img src="{{ $waKoorKelKecil->photo }}" alt="{{ $waKoorKelKecil->name }}">
                        <h3>{{ $waKoorKelKecil->name }}</h3>
                        <p>Jurusan: {{ $waKoorKelKecil->major }}</p>
                        <p>Angkatan: {{ $waKoorKelKecil->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['WaKoor Divisi Praise & Worship'] as $waKoorPW)
                    <div class="member">
                        <img src="{{ $waKoorPW->photo }}" alt="{{ $waKoorPW->name }}">
                        <h3>{{ $waKoorPW->name }}</h3>
                        <p>Jurusan: {{ $waKoorPW->major }}</p>
                        <p>Angkatan: {{ $waKoorPW->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Doa & Pemerhati'] as $anggotaDoa)
                    <div class="member">
                        <img src="{{ $anggotaDoa->photo }}" alt="{{ $anggotaDoa->name }}">
                        <h3>{{ $anggotaDoa->name }}</h3>
                        <p>Jurusan: {{ $anggotaDoa->major }}</p>
                        <p>Angkatan: {{ $anggotaDoa->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Acara'] as $anggotaAcara)
                    <div class="member">
                        <img src="{{ $anggotaAcara->photo }}" alt="{{ $anggotaAcara->name }}">
                        <h3>{{ $anggotaAcara->name }}</h3>
                        <p>Jurusan: {{ $anggotaAcara->major }}</p>
                        <p>Angkatan: {{ $anggotaAcara->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Publikasi & Dokumentasi'] as $anggotaPubDok)
                    <div class="member">
                        <img src="{{ $anggotaPubDok->photo }}" alt="{{ $anggotaPubDok->name }}">
                        <h3>{{ $anggotaPubDok->name }}</h3>
                        <p>Jurusan: {{ $anggotaPubDok->major }}</p>
                        <p>Angkatan: {{ $anggotaPubDok->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Kelompok Kecil'] as $anggotaKelKecil)
                    <div class="member">
                        <img src="{{ $anggotaKelKecil->photo }}" alt="{{ $anggotaKelKecil->name }}">
                        <h3>{{ $anggotaKelKecil->name }}</h3>
                        <p>Jurusan: {{ $anggotaKelKecil->major }}</p>
                        <p>Angkatan: {{ $anggotaKelKecil->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Praise & Worship'] as $anggotaPW)
                    <div class="member">
                        <img src="{{ $anggotaPW->photo }}" alt="{{ $anggotaPW->name }}">
                        <h3>{{ $anggotaPW->name }}</h3>
                        <p>Jurusan: {{ $anggotaPW->major }}</p>
                        <p>Angkatan: {{ $anggotaPW->batch }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
