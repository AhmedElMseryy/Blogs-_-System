<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\StoreCommentController;
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
##--------------------------------------- AUTH MODULE
Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});

##--------------------------------------- COMMENT MODULE
Route::get('/comment', CommentController::class);

##--------------------------------------- Categories MODULE
Route::get('/category', CategoryController::class);

##--------------------------------------- Blogs MODULE
Route::get('/blog/{category_id?}', BlogController::class);

##--------------------------------------- STORE COMMENT MODULE
Route::post('/comment/store', StoreCommentController::class);

##--------------------------------------- SEARCH MODULE
Route::get('/search', SearchController::class);
