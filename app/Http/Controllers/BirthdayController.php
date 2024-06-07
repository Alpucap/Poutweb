<?php

namespace App\Http\Controllers;

use App\Models\Birthday;

class BirthdayController extends Controller
{
    public function index()
    {
        $birthdays = Birthday::all();
        return view('homepage', compact('birthdays'));
    }
}
