<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class RenunganController extends Controller
{
    public function index()
    {
        $renunganItems = [
            (object)[
                'title' => 'Doa',
                'description' => 'Bertekunlah dalam doa dan dalam pada itu berjaga-jagalah sambil mengucap syukur.',
                'link' => '/renungan/doa'
            ],
            (object)[
                'title' => 'Khawatir',
                'description' => 'Janganlah cemas tentang apapun, tetapi dalam segala hal dengan doa dan permohonan serta syukur, sampaikanlah permintaan kepada Allah.',
                'link' => '/renungan/khawatir'
            ],
            (object)[
                'title' => 'Mengasihi Sesama',
                'description' => 'Dan yang kedua, sama dengan itu: Kasihilah sesamamu manusia seperti dirimu sendiri.',
                'link' => '/renungan/mengasihi-sesama'
            ],
            (object)[
                'title' => 'Melayani',
                'description' => 'Bersama-sama melayani dengan sukacita, karena hal itu akan membuat hidup kita berbeda dari yang lain.',
                'link' => '/renungan/melayani'
            ],
            (object)[
                'title' => 'Love In Hard Places',
                'description' => 'Mengasihi dalam tempat-tempat sulit membutuhkan keberanian dan kepercayaan pada Allah yang mampu menguatkan kita.',
                'link' => '/renungan/love-in-hard-places'
            ]
        ];

        $newsItems = [
            (object)[
                'image' => 'img/News-PD.png',
                'title' => 'Persekutuan Doa',
                'description' => 'Every Wednesday at 15.30'
            ],
            (object)[
                'image' => 'img/News-PJ.png',
                'title' => 'Persekutuan Jumat',
                'description' => 'Every Friday at 11.30'
            ],
        ];

        $comments = Comment::all();

        return view('renungan', compact('renunganItems', 'newsItems', 'comments'));
    }
}
