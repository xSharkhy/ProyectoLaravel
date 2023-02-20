<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EventController;

// Páginas estáticas
Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

Route::get('/cookies', function () {
    return view('pages.privacy.cookies');
})->name('cookies');

Route::get('/policy', function () {
    return view('pages.privacy.policy');
})->name('policy');

Route::get('/cookiemanage', function () {
    return view('pages.privacy.cookiemanage');
})->name('cookiemanage');

Route::get('/location', function () {
    return view('pages.location');
})->name('location');

// LoginController routes
Route::get('/register', [LoginController::class, 'registerForm']);
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'loginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// UserController routes
Route::resource('users', UserController::class)->only(['index']);
Route::resource('users', UserController::class)->only(['show', 'edit', 'update', 'destroy'])->middleware('auth');

// EventController routes
Route::resource('events', EventController::class)->only(['index']);
Route::resource('events', EventController::class)->only(['create', 'store', 'show', 'edit', 'update', 'destroy'])->middleware('auth');
Route::put('events/toggle-join/{event}', [EventController::class, 'toggleJoin'])->name('events.toggleJoin')->middleware('auth');


// MessageController routes
Route::resource('messages', MessageController::class)->only(['create', 'store']);
Route::resource('messages', MessageController::class)->only(['index', 'show', 'update', 'destroy'])->middleware('auth');