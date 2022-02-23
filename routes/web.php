<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    return redirect()->route('login');
});



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


use Illuminate\Http\Request;

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Auth::routes();
Route::middleware(['auth', 'verified'])->group(function () {  
    Route::get('user/map', [UserController::class, 'map'])->name('user.map');   
    Route::middleware(['admin'])->group(function () {  
        Route::resource('user', UserController::class);
    });
    Route::middleware(['user'])->group(function () {     
        Route::get('profile/introducer', [ProfileController::class, 'introducerRegisterForm'])->name('build.introducerRegisterForm');   
        Route::post('profile/introducer', [ProfileController::class, 'introducerRegister'])->name('build.introducerRegister');   
        Route::resource('profile', ProfileController::class);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
