<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\AdminController;

Route::get('/', [BirthdayController::class, 'index']);

Route::get('/renungan', function () {
    return view('renungan');
});

//admin storing
Route::get('/admin', function () {
    return view('admin');
});

Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
