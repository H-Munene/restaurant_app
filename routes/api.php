<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderdetailsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewsController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// Route::get('usertype', [UserController::class, 'showUserType']);
// Route::post('menuitem', [MenuController::class, 'store']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResources([
        'categories' => CategoriesController::class,
        'menus' => MenuController::class,
        'orders' => OrdersController::class,
        'payments' => PaymentsController::class,
        'orderdetails' => OrderdetailsController::class,
        'users' => UserController::class,
        'reviews' => ReviewsController::class,
    ]);
});