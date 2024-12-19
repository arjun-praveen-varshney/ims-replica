<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PaperController;

Route::get('/', function () {
    return view('dashboard'); // Main dashboard
})->name('dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('achievements', AchievementController::class);
    Route::resource('internships', InternshipController::class);
    Route::resource('papers', PaperController::class);
    Route::resource('programs', ProgramController::class);
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');