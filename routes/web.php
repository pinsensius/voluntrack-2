<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function() {
    // Route::get('/admin/dashboard', [AdminController::class, 'eventindex'])->name('index');
    Route::resource('/relawan', RelawanController::class);
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
        Route::prefix('event')->name('event.')->group(function () {
            Route::get('/', [AdminController::class, 'eventindex'])->name('index');
            Route::get('/{event}', [AdminController::class, 'eventShow'])->name('show');
            Route::get('/{event}/edit', [AdminController::class, 'eventEdit'])->name('edit');
            Route::put('/{event}/approve', [AdminController::class, 'approveEvent'])->name('approve');
            Route::put('/{event}/reject', [AdminController::class, 'rejectEvent'])->name('reject');
            Route::put('/{event}', [AdminController::class, 'eventUpdate'])->name('update');
            Route::delete('/{event}', [AdminController::class, 'eventDestroy'])->name('destroy');
        });
    });
    // Route::resource('/event', EventController::class);  // Admin bisa akses halaman event juga , mungkin?? masih dicoba
});

// Relawan Routes
Route::middleware(['auth', 'role:relawan'])->group(function() {
    Route::get('/home', [UserController::class, 'dashboard']);
    Route::resource('/relawan', RelawanController::class);
    Route::get('/relawan/daftar/{event}', [RelawanController::class, 'daftar'])->name('relawan.daftar');
    // Route::resource('/event', EventController::class);  // Masih dicoba juga
});

Route::middleware(['auth', 'role:admin|relawan'])->group(function() {
    Route::resource('/event', EventController::class);  
    Route::get('/donasi/{event}', [DonasiController::class, 'create'])->name('donasi');
    
});

Route::resource('/merchant', ItemController::class);

Route::resource('/comment', CommentController::class);

Route::resource('/topic', TopicController::class);


Route::post('/create-transaction', [DonasiController::class, 'createTransaction']);
Route::post('/notification-handler', [DonasiController::class, 'handleNotification']);



// Route::resource('/event', EventController::class);


require __DIR__.'/auth.php';
