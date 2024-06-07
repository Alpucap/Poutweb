<?php

namespace App\Http\Controllers;

use App\Models\Birthday;

class BirthdayController extends Controller
{
    public function showBirthdays()
    {
        $birthdays = Birthday::all();
        \Log::debug('Birthdays:', $birthdays->toArray());
        dd($birthdays);
        return view('homepage', compact('birthdays'));
    }
}
