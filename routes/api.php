<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("login", [UserController::class, 'login']);
Route::post("register", [UserController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's
    Route::apiResource('author', 'App\Http\Controllers\AuthorController');
    Route::apiResource('book', 'App\Http\Controllers\BookController');
    Route::GET('author/search/{term}', 'App\Http\Controllers\AuthorController@search');

});



