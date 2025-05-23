<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/search', [BookController::class, 'search']);
    Route::post('/books/borrow/{book}', [BookController::class, 'borrow']);
    Route::post('/books/return/{book}', [BookController::class, 'return']);
});