<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;



Route::get('/test', function () {
    return response()->json(['message' => 'API routing works!']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/search', [BookController::class, 'search']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); 
    Route::get('/user', [AuthController::class, 'user']);

    Route::prefix('books')->group(function () {
        
        Route::post('/borrow', [BookController::class, 'borrow']);
        Route::put('/return/{book}', [BookController::class, 'return']);
    });

});