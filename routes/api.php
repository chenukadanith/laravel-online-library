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

// Authentication routes (these typically do not require authentication themselves)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public book routes (accessible without authentication)
// These routes typically include viewing lists or searching, but not modifying data
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/search', [BookController::class, 'search']);
});


// Protected routes (require authentication via Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); // Logout should be protected
    Route::get('/user', [AuthController::class, 'user']);

    // Protected book-related actions
    Route::prefix('books')->group(function () {
        // Changed to POST and PUT as per previous refactoring for borrow/return logic
        // Also removed redundant {book} parameter from borrow as it's now in the request body
        Route::post('/borrow', [BookController::class, 'borrow']);
        Route::put('/return/{book}', [BookController::class, 'return']);
    });

    // Add any other protected routes here (e.g., for creating/updating/deleting books if applicable)
});