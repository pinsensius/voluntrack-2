<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing');
})->name('landing');

Route::get('/about-us', function () {
    return view('aboutUs');
})->name('aboutUs');

Route::get('/loginPage', function () {
    return view('loginPage');
})->name('loginPage');

Route::get('/registerPage', function () {
    return view('registerPage');
})->name('registerPage');

Route::get('/profileUser', function () {
    return view('profileUser');
})->name('profileUser');

Route::get('/userInfo', function () {
    return view('userInfo');
})->name('userInfo');

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/listEvent', function () {
    return view('listEvent');
})->name('listEvent');

Route::get('/eventDetail', function () {
    return view('eventDetail');
})->name('eventDetail');

Route::get('/registEvent', function () {
    return view('registEvent');
})->name('registEvent');

Route::get('/paygate', function () {
    return view('paygate');
})->name('paygate');

Route::get('/createEvent', function () {
    return view('createEvent');
})->name('createEvent');

Route::get('/registRelawan', function () {
    return view('registRelawan');
})->name('registRelawan');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('/relawan', RelawanController::class);
    // Route::resource('/event', EventController::class);  // Admin can access event
});

// Relawan Routes
Route::middleware(['auth', 'role:relawan'])->group(function () {
    Route::get('/home', [UserController::class, 'dashboard']);
    Route::resource('/relawan', RelawanController::class);
    Route::get('/relawan/daftar/{event}', [RelawanController::class, 'daftar'])->name('relawan.daftar');
    // Route::resource('/event', EventController::class);  // Relawan can also access event
});

Route::middleware(['auth', 'role:admin|relawan'])->group(function () {
    Route::resource('/event', EventController::class);  // Both admin and relawan can access event
});


// Route::resource('/event', EventController::class);


require __DIR__ . '/auth.php';
