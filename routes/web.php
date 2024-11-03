<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home\TourController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Letters\LetterController;
use App\Http\Controllers\Tour\TourPackageController;
use App\Http\Controllers\Tour\TourDestinationController;
use App\Http\Controllers\Letters\IncomingLetterController;
use App\Http\Controllers\Letters\OutgoingLetterController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');

Route::get('/wisata', [TourController::class, 'index'])
    ->name('tour.index');

Route::get('/wisata/{uuid}', [TourController::class, 'wisata'])
    ->name('tour.detail');

Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');


Route::group(['middleware' => ['auth', 'verified',], 'prefix' => 'panel'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('profiles', ProfileController::class);
    // Route::get('users/scan/{code}', [UserController::class, 'scan'])->name('users.scan');
});

Route::group(['middleware' => ['auth', 'verified',], 'prefix' => 'tour'], function () {
    Route::delete('/tour-destinations/bulkDestroy', [TourDestinationController::class, 'bulkDestroy'])->name('tour-destinations.bulkDestroy');
    Route::get('/tour-destinations/download/{id}', [TourDestinationController::class, 'download'])->name('tour-destinations.download');
    Route::resource('tour-destinations', TourDestinationController::class);
    Route::delete('/tour-packages/bulkDestroy', [TourPackageController::class, 'bulkDestroy'])->name('tour-packages.bulkDestroy');
    Route::get('/tour-packages/download/{id}', [TourPackageController::class, 'download'])->name('tour-packages.download');
    Route::resource('tour-packages', TourPackageController::class);
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'management'], function () {
    Route::delete('/incoming-letters/bulkDestroy', [IncomingLetterController::class, 'bulkDestroy'])->name('incoming-letters.bulkDestroy');
    Route::get('/incoming-letters/download/{id}', [IncomingLetterController::class, 'download'])->name('incoming-letters.download');
    Route::resource('incoming-letters', IncomingLetterController::class);
    Route::delete('/outgoing-letters/bulkDestroy', [OutgoingLetterController::class, 'bulkDestroy'])->name('outgoing-letters.bulkDestroy');
    Route::get('/outgoing-letters/download/{id}', [OutgoingLetterController::class, 'download'])->name('outgoing-letters.download');
    Route::resource('outgoing-letters', OutgoingLetterController::class);
});

require __DIR__ . '/auth.php';
