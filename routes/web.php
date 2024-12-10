<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialiteController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\SupportController;

Route::post('/support/send-email', [SupportController::class, 'sendEmail'])->name('support.send-email');


//email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('auth/google', [SocialiteController::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google-callback', [SocialiteController::class, 'googleCallback']);



//User dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/UserDashboard', [UserController::class, 'index'])->name('UserDashboard');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

//Camera dashboard
Route::get('/CameraDashboard', [CameraController::class, 'dashboard'])
    ->middleware(['auth', 'admin'])
    ->name('CameraDashboard');

Route::post('/cameras/{camera}', [CameraController::class, 'updatePrice'])
    ->middleware(['auth', 'admin'])
    ->name('cameras.updatePrice');

//Guest_shop
Route::get('/shop_guest', [CameraController::class, 'index_guest'])->name('shop_guest');

// //Authenticated_shop
Route::get('/shop', [CameraController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('shop');

Route::post('/shop', [CameraController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('shop.store');
// //end


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
