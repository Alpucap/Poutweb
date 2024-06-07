<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthdayController;

Route::get('/homepage', [BirthdayController::class, 'showBirthdays']);
