<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return view('layouts.app-layout');
})->name('home');
Route::get("*", function () {
    return redirect('/404');
});
Route::get('/404', function () {
    return view('pages.404.page');
});
Route::get('/login', function () {
    return view('pages.login.page');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('pages.dashboard.page');
})->name('dashboard');
