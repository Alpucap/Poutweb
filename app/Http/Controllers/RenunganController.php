<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class RenunganController extends Controller
{
    public function index()
    {
        // Sample data, this could be fetched from a database or an API
        $renunganItems = [
            (object)[
                'title' => 'Overthink',
                'description' => 'Overthink is a pattern of excessive thinking...',
                'link' => '/renungan/overthink'
            ],
            (object)[
                'title' => 'Self Reflection',
                'description' => 'Self reflection is a way to understand yourself better...',
                'link' => '/renungan/self-reflection'
            ],
            (object)[
                'title' => 'Mindfulness',
                'description' => 'Mindfulness helps you stay in the present moment...',
                'link' => '/renungan/mindfulness'
            ],
            (object)[
                'title' => 'Gratitude',
                'description' => 'Practicing gratitude can improve your mental health...',
                'link' => '/renungan/gratitude'
            ],
            (object)[
                'title' => 'Gratitude',
                'description' => 'Practicing gratitude can improve your mental health...',
                'link' => '/renungan/gratitude'
            ],
        ];

        $newsItems = [
            (object)[
                'image' => 'img/Worship1.jpg',
                'title' => 'Event 1',
                'description' => 'Description for event 1...'
            ],
            (object)[
                'image' => 'img/Worship2.jpg',
                'title' => 'Event 2',
                'description' => 'Description for event 2...'
            ],
            // Add more news items as needed
        ];

        // Fetch comments from the database
        $comments = Comment::all();

        return view('renungan', compact('renunganItems', 'newsItems', 'comments'));
    }
}
