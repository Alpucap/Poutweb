<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\RenunganController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\POUTStructureController;
use App\Http\Controllers\CounselingController;

// Main Routes
Route::get('/', [BirthdayController::class, 'index'])->name('home');
Route::get('/homepage', [BirthdayController::class, 'index'])->name('homepage');

// Authentication Routes
Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.process');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.show');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile/delete', [AuthController::class, 'deleteAccount'])->name('profile.destroy');
});

// Renungan Routes
Route::get('/renungan', [RenunganController::class, 'index'])->name('renungan.index');
Route::get('/renungan/doa', function () { return view('renungan.doa');});
Route::get('/renungan/khawatir', function () { return view('renungan.khawatir');});
Route::get('/renungan/mengasihi-sesama', function () { return view('renungan.mengasihi-sesama');});
Route::get('/renungan/melayani', function () { return view('renungan.melayani');});
Route::get('/renungan/love-in-hard-places', function () { return view('renungan.love-in-hard-places');});

// Comment Routes
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});


// POUT Structure Routes
Route::get('/servant', [POUTStructureController::class, 'index'])->name('servant.index');
Route::get('/servant/pdpj', [POUTStructureController::class, 'PDPJ'])->name('servant.pdpj');

// Counseling Routes
Route::middleware('auth')->group(function () {
    Route::get('/counseling', [CounselingController::class, 'index'])->name('counseling');
    Route::post('/counseling/submit', [CounselingController::class, 'submit'])->name('counseling.submit');
    Route::post('/counseling/{id}/update', [CounselingController::class, 'update'])->name('counseling.update');
    Route::delete('/counseling/{id}/delete', [CounselingController::class, 'delete'])->name('counseling.delete');
});


// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // Birthday Routes
    Route::prefix('admin/birthday')->group(function () {
        Route::get('/', [AdminController::class, 'birthdayIndex'])->name('admin.birthday.index');
        Route::post('/store', [AdminController::class, 'birthdayStore'])->name('admin.birthday.store');
        Route::get('/edit/{id}', [AdminController::class, 'birthdayEdit'])->name('admin.birthday.edit');
        Route::put('/update/{id}', [AdminController::class, 'birthdayUpdate'])->name('admin.birthday.update');
        Route::delete('/destroy/{id}', [AdminController::class, 'birthdayDestroy'])->name('admin.birthday.destroy');
    });

    // POUT Structure Routes
    Route::prefix('admin/structure')->group(function () {
        Route::post('/store', [AdminController::class, 'storeMember'])->name('admin.structure.storeMember');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.structure.edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.structure.update');
        Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.structure.destroy');
    });

    // PDPJ (PD PJ) Routes
    Route::prefix('admin/pdpj')->group(function () {
        Route::post('/store', [AdminController::class, 'storePdpjMember'])->name('admin.pdpj.store');
        Route::get('/edit/{id}', [AdminController::class, 'editPdpjMember'])->name('admin.pdpj.edit');
        Route::put('/update/{id}', [AdminController::class, 'updatePdpjMember'])->name('admin.pdpj.update');
        Route::delete('/destroy/{id}', [AdminController::class, 'destroyPdpjMember'])->name('admin.pdpj.destroy');
    });
});





