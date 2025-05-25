<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', function () {
    return response()->json(['message' => 'API routing works!']);
});

// Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public book routes (accessible without authentication)
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/search', [BookController::class, 'search']);
    Route::get('/borrow/{book}', [BookController::class, 'borrow']);
    Route::get('/return/{book}', [BookController::class, 'return']);
});

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Add any other protected routes here
});