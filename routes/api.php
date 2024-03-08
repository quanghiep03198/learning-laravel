<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('', function (Request $req) {
    $url = $req->fullUrl();


    return response()->json([
        "messages" => "Server is running on: $url",
    ]);
})->name('welcome');

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});
Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::prefix('product')->middleware()->group(function(){
    Route::get('/published', [])
});
