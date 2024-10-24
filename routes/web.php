<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Letters\LetterController;
use App\Http\Controllers\Letters\IncomingLetterController;
use App\Http\Controllers\Letters\OutgoingLetterController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard.index');
    }
    return redirect()->route('login');
});

Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');


Route::group(['middleware' => ['auth', 'verified',], 'prefix' => 'panel'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('profiles', ProfileController::class);
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'management'], function () {
    Route::delete('/incoming-letters/bulkDestroy', [IncomingLetterController::class, 'bulkDestroy'])->name('incoming-letters.bulkDestroy');
    Route::get('/incoming-letters/download/{id}', [IncomingLetterController::class, 'download'])->name('incoming-letters.download');
    Route::resource('incoming-letters', IncomingLetterController::class);
    Route::delete('/outgoing-letters/bulkDestroy', [OutgoingLetterController::class, 'bulkDestroy'])->name('outgoing-letters.bulkDestroy');
    Route::get('/outgoing-letters/download/{id}', [OutgoingLetterController::class, 'download'])->name('outgoing-letters.download');
    Route::resource('outgoing-letters', OutgoingLetterController::class);
});

Route::get('generate-pdf', [PrintController::class, 'generatePDF']);

require __DIR__ . '/auth.php';
