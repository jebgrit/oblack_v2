<?php

use App\Http\Controllers\Frontend\BookmarkController;
use App\Http\Controllers\Frontend\AnnouncementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {

    // Submit Annonce
    Route::controller(AnnouncementController::class)->group(function () {
        Route::get('/submit', 'submit')->name('submit');
        Route::post('/store', 'store')->name('store');
        Route::post('/delete/{id}', 'delete')->name('delete');

        Route::get('/myannonce', 'myannonce')->name('myannonce');
    });

    // Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/update', 'update')->name('update');
        Route::post('/updatePasswrd', 'updatePasswrd')->name('updatePasswrd');


        Route::get('/chat', 'chat')->name('chat');
    });


    // Bookmark
    Route::controller(BookmarkController::class)->group(function () {
        Route::get('/bookmark', 'bookmark')->name('bookmark');
    });
});


// Announcement
Route::controller(AnnouncementController::class)->group(function () {
    Route::get('/annonce/details/{id}/{slug}', 'details');
    Route::get('/annonce/sort/', 'sort')->name('sort');
});


require __DIR__ . '/auth.php';
