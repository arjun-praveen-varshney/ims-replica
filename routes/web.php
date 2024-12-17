<?php
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('dashboard'); // Main dashboard
})->name('dashboard')->middleware('auth');

// Resource routes for internships and achievements
Route::resource('internships', InternshipController::class);
Route::resource('achievements', AchievementController::class);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');