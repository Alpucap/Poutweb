@extends('layouts.servant-layout')

@section('title', 'Servant')

@section('content')


{{-- PD/PJ Servants --}}
<div class="Servants" id="PDPJ">
    <h1>PDPJ Servants</h1>
    <div class="Servants-item">
        {{-- PJ Servants --}}
        <div class="PJServants" id="PJ">
            <h2>PJ Servants</h2>
            <div class="cards-container">
                @foreach($pjServants as $pj)
                    <div class="member">
                        <h3>{{ $pj->name }}</h3>
                        <p>{{ $pj->major }} | {{ $pj->batch }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- PD Servants --}}
        <div class="PDServants" id="PD">
            <h2>PD Servants</h2>
            <div class="cards-container">
                @foreach($pdServants as $pd)
                    <div class="member">
                        <h3>{{ $pd->name }}</h3>
                        <p>{{ $pd->major }} | {{ $pd->batch }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Structure --}}
<div class="Servants" id="STRUCTURE">
    <h1>The organizational structure at POUT</h1>
    <div class="Servants-item">
        <div class="KetumWaketum">
            <h2>KETUM & WAKETUM</h2>
            <div class="cards-container">
                @foreach($sortedStructures['Ketum'] as $ketum)
                    <div class="member">
                        <h4>{{ $ketum->role }}</h4>
                        <img src="{{ $ketum->photo }}" alt="{{ $ketum->name }}">
                        <h3>{{ $ketum->name }}</h3>
                        <p>{{ $ketum->major }} | {{ $ketum->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Waketum'] as $waketum)
                    <div class="member">
                        <h4>{{ $waketum->role }}</h4>
                        <img src="{{ $waketum->photo }}" alt="{{ $waketum->name }}">
                        <h3>{{ $waketum->name }}</h3>
                        <p>{{ $waketum->major }} | {{ $waketum->batch }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="BPHI">
            <h2>SEKBEN</h2>
            <div class="cards-container">
                @foreach($sortedStructures['Sekretaris 1'] as $sekre1)
                    <div class="member">
                        <h4>{{ $sekre1->role }}</h4>
                        <img src="{{ $sekre1->photo }}" alt="{{ $sekre1->name }}">
                        <h3>{{ $sekre1->name }}</h3>
                        <p>{{ $sekre1->major }} | {{ $sekre1->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Sekretaris 2'] as $sekre2)
                    <div class="member">
                        <h4>{{ $sekre2->role }}</h4>
                        <img src="{{ $sekre2->photo }}" alt="{{ $sekre2->name }}">
                        <h3>{{ $sekre2->name }}</h3>
                        <p>{{ $sekre2->major }} | {{ $sekre2->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Bendahara'] as $bendahara)
                    <div class="member">
                        <h4>{{ $bendahara->role }}</h4>
                        <img src="{{ $bendahara->photo }}" alt="{{ $bendahara->name }}">
                        <h3>{{ $bendahara->name }}</h3>
                        <p>{{ $bendahara->major }} | {{ $bendahara->batch }}</p>
                    </div>
                @endforeach
            </div>
            <h2>KOORDINATOR</h2>
            <div class="cards-container">
                @foreach($sortedStructures['Koor Divisi Doa & Pemerhati'] as $koorDoa)
                    <div class="member">
                        <h4>{{ $koorDoa->role }}</h4>
                        <img src="{{ $koorDoa->photo }}" alt="{{ $koorDoa->name }}">
                        <h3>{{ $koorDoa->name }}</h3>
                        <p>{{ $koorDoa->major }} | {{ $koorDoa->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Koor Divisi Acara'] as $koorAcara)
                    <div class="member">
                        <h4>{{ $koorAcara->role }}</h4>
                        <img src="{{ $koorAcara->photo }}" alt="{{ $koorAcara->name }}">
                        <h3>{{ $koorAcara->name }}</h3>
                        <p>{{ $koorAcara->major }} | {{ $koorAcara->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Koor Divisi Publikasi & Dokumentasi'] as $koorPubDok)
                    <div class="member">
                        <h4>{{ $koorPubDok->role }}</h4>
                        <img src="{{ $koorPubDok->photo }}" alt="{{ $koorPubDok->name }}">
                        <h3>{{ $koorPubDok->name }}</h3>
                        <p>{{ $koorPubDok->major }} | {{ $koorPubDok->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Koor Divisi Kelompok Kecil'] as $koorKelKecil)
                    <div class="member">
                        <h4>{{ $koorKelKecil->role }}</h4>
                        <img src="{{ $koorKelKecil->photo }}" alt="{{ $koorKelKecil->name }}">
                        <h3>{{ $koorKelKecil->name }}</h3>
                        <p>{{ $koorKelKecil->major }} | {{ $koorKelKecil->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Koor Divisi Praise & Worship'] as $koorPW)
                    <div class="member">
                        <h4>{{ $koorPW->role }}</h4>
                        <img src="{{ $koorPW->photo }}" alt="{{ $koorPW->name }}">
                        <h3>{{ $koorPW->name }}</h3>
                        <p>{{ $koorPW->major }} | {{ $koorPW->batch }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="BPH">
            <h2>BPH</h2>
            <div class="cards-container">
                @foreach($sortedStructures['WaKoor Divisi Doa & Pemerhati'] as $waKoorDoa)
                    <div class="member">
                        <h4>{{ $waKoorDoa->role }}</h4>
                        <img src="{{ $waKoorDoa->photo }}" alt="{{ $waKoorDoa->name }}">
                        <h3>{{ $waKoorDoa->name }}</h3>
                        <p>{{ $waKoorDoa->major }} | {{ $waKoorDoa->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['WaKoor Divisi Acara'] as $waKoorAcara)
                    <div class="member">
                        <h4>{{ $waKoorAcara->role }}</h4>
                        <img src="{{ $waKoorAcara->photo }}" alt="{{ $waKoorAcara->name }}">
                        <h3>{{ $waKoorAcara->name }}</h3>
                        <p>{{ $waKoorAcara->major }} | {{ $waKoorAcara->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['WaKoor Divisi Publikasi & Dokumentasi'] as $waKoorPubDok)
                    <div class="member">
                        <h4>{{ $waKoorPubDok->role }}</h4>
                        <img src="{{ $waKoorPubDok->photo }}" alt="{{ $waKoorPubDok->name }}">
                        <h3>{{ $waKoorPubDok->name }}</h3>
                        <p>{{ $waKoorPubDok->major }} | {{ $waKoorPubDok->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['WaKoor Divisi Kelompok Kecil'] as $waKoorKelKecil)
                    <div class="member">
                        <h4>{{ $waKoorKelKecil->role }}</h4>
                        <img src="{{ $waKoorKelKecil->photo }}" alt="{{ $waKoorKelKecil->name }}">
                        <h3>{{ $waKoorKelKecil->name }}</h3>
                        <p>{{ $waKoorKelKecil->major }} | {{ $waKoorKelKecil->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['WaKoor Divisi Praise & Worship'] as $waKoorPW)
                    <div class="member">
                        <h4>{{ $waKoorPW->role }}</h4>
                        <img src="{{ $waKoorPW->photo }}" alt="{{ $waKoorPW->name }}">
                        <h3>{{ $waKoorPW->name }}</h3>
                        <p>{{ $waKoorPW->major }} | {{ $waKoorPW->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Doa & Pemerhati'] as $anggotaDoa)
                    <div class="member">
                        <h4>{{ $anggotaDoa->role }}</h4>
                        <img src="{{ $anggotaDoa->photo }}" alt="{{ $anggotaDoa->name }}">
                        <h3>{{ $anggotaDoa->name }}</h3>
                        <p>{{ $anggotaDoa->major }} | {{ $anggotaDoa->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Acara'] as $anggotaAcara)
                    <div class="member">
                        <h4>{{ $anggotaAcara->role }}</h4>
                        <img src="{{ $anggotaAcara->photo }}" alt="{{ $anggotaAcara->name }}">
                        <h3>{{ $anggotaAcara->name }}</h3>
                        <p>{{ $anggotaAcara->major }} | {{ $anggotaAcara->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Publikasi & Dokumentasi'] as $anggotaPubDok)
                    <div class="member">
                        <h4>{{ $anggotaPubDok->role }}</h4>
                        <img src="{{ $anggotaPubDok->photo }}" alt="{{ $anggotaPubDok->name }}">
                        <h3>{{ $anggotaPubDok->name }}</h3>
                        <p>{{ $anggotaPubDok->major }} | {{ $anggotaPubDok->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Kelompok Kecil'] as $anggotaKelKecil)
                    <div class="member">
                        <h4>{{ $anggotaKelKecil->role }}</h4>
                        <img src="{{ $anggotaKelKecil->photo }}" alt="{{ $anggotaKelKecil->name }}">
                        <h3>{{ $anggotaKelKecil->name }}</h3>
                        <p>{{ $anggotaKelKecil->major }} | {{ $anggotaKelKecil->batch }}</p>
                    </div>
                @endforeach
                @foreach($sortedStructures['Anggota Divisi Praise & Worship'] as $anggotaPW)
                    <div class="member">
                        <h4>{{ $anggotaPW->role }}</h4>
                        <img src="{{ $anggotaPW->photo }}" alt="{{ $anggotaPW->name }}">
                        <h3>{{ $anggotaPW->name }}</h3>
                        <p>{{ $anggotaPW->major }} | {{ $anggotaPW->batch }}</p>
                    </div>
                @endforeach
            </div>
        </div>        
    </div>
</div>

@include('loader')

<script>
    window.addEventListener('load', function() {
        document.getElementById('loader').style.display = 'none';
    });
</script>

@endsection
