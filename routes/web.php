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
Route::get('/homepage', [BirthdayController::class, 'index'])->name('home');

// Authentication Routes
Route::get('signin', [AuthController::class, 'showForm'])->name('signin');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Renungan Routes
Route::get('/renungan', [RenunganController::class, 'index'])->name('renungan.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update')->middleware('web');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Servant Routes
Route::get('/servant', [POUTStructureController::class, 'index']);
Route::get('/servant/pdpj', [POUTStructureController::class, 'PDPJ']);


// Counseling Routes
// Counseling Routes
Route::middleware('auth')->group(function () {
    Route::get('/counseling', [CounselingController::class, 'index'])->name('counseling');
    Route::post('/counseling/submit', [CounselingController::class, 'submit'])->name('counseling.submit');
    Route::post('/counseling/{id}/update', [CounselingController::class, 'update'])->name('counseling.update');
    Route::delete('/counseling/{id}/delete', [CounselingController::class, 'delete'])->name('counseling.delete');
});


// Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::post('/admin/storeMember', [AdminController::class, 'storeMember'])->name('admin.storeMember');
