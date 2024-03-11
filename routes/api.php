<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AllFilterExceptions;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckAuthMiddleware;
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




Route::middleware([AllFilterExceptions::class])->prefix("auth")->group(function () {
    Route::post("/login", [AuthController::class, "login"])->name("auth.login");
    Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");
});

Route::prefix("user")->group(function () {
    Route::post("/register", [UserController::class, "register"])->name("user.register");
    Route::get("/profile", [UserController::class, "getProfile"])->middleware([CheckAuthMiddleware::class])->name("user.getProfile");
});

Route::middleware([CheckAuthMiddleware::class, CheckAdminMiddleware::class, AllFilterExceptions::class])->prefix("products")->group(function () {
    Route::get("/published", [ProductController::class, "getPublishedProducts"])->withoutMiddleware([CheckAuthMiddleware::class, CheckAdminMiddleware::class])->name("products.get_published");
    Route::get("/draft", [ProductController::class, "getDraftProducts"])->name("products.get_draft");
    Route::post("/create", [ProductController::class, "createProduct"])->name("product.create");
    Route::patch("/{id}/update", [ProductController::class, "updateProduct"])->name("product.update");
    Route::patch("/{id}/publish", [ProductController::class, "publishProduct"])->name("product.publish");
    Route::delete("/{id}/delete", [ProductController::class, "deleteProduct"])->name("product.delete");
});
