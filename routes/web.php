<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\UserController;

//User dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/UserDashboard', [UserController::class, 'index'])->name('UserDashboard');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

//Camera dashboard
Route::get('/CameraDashboard', [CameraController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('CameraDashboard');

Route::post('/cameras/{camera}', [CameraController::class, 'updatePrice'])
    ->middleware(['auth', 'verified'])
    ->name('cameras.updatePrice');

//DASHBOARD
Route::get('/Dashboard', function () {
    return Inertia::render('AdminDashboard');
})->middleware(['auth', 'verified'])->name('Dashboard');

//Guest_shop
Route::get('/shop_guest', [CameraController::class, 'index_guest'])->name('shop_guest');

//Authenticated_shop
Route::get('/shop', [CameraController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('shop');

Route::post('/shop', [CameraController::class, 'store'])
    ->middleware(['auth', 'verified']);
//end



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('landingPage');

Route::get('/home', function () {
    return Inertia::render('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/aboutus', function () {
    return Inertia::render('aboutus');
})->middleware(['auth', 'verified'])->name('aboutus');

Route::get('/myaccount', function () {
    return Inertia::render('myaccount');
})->middleware(['auth', 'verified'])->name('myaccount');

Route::get('/support', function () {
    return Inertia::render('support');
})->middleware(['auth', 'verified'])->name('support');


//edit profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
