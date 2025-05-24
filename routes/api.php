<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; // <-- Make sure to import your Controller

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auto-generated route (often used with Sanctum for SPA authentication)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Your Book API routes
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/search', [BookController::class, 'search']);
    Route::post('/borrow/{book}', [BookController::class, 'borrow']);
    Route::post('/return/{book}', [BookController::class, 'return']);
});

// Consider keeping this if your frontend explicitly requests CSRF tokens,
// but for pure API usage (e.g., Postman, mobile apps, JavaScript frameworks
// that don't rely on Laravel sessions for authentication like JWT, OAuth),
// CSRF tokens are generally not needed.
// Route::get('/csrf-token', function () {
//     return response()->json([
//         'csrf_token' => csrf_token()
//     ]);
// }
// );