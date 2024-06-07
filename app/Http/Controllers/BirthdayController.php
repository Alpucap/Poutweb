<?php

namespace App\Http\Controllers;

use App\Models\Birthday;

class BirthdayController extends Controller
{
    public function index()
    {
        $birthdays = Birthday::all();
        \Log::debug('Birthdays:', $birthdays->toArray());
        dd($birthdays);
        return view('homepage', compact('birthdays'));
    }
}
