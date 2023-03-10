<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GuestBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/guest-book', GuestBookController::class)->only(['index']);

Route::resource('/guest-book/{guest_book}/comments', CommentController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->scoped([
        'guest_book' => 'uuid',
        'comment' => 'uuid'
    ]);
