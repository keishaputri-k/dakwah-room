<?php

use App\Http\Controllers\LectureController;
use App\Http\Controllers\PostController;
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
Route::get('lecture/get/', [LectureController::class,'readLectureAll']);
Route::get('lecture/get/{id}', [LectureController::class,'readLecture']);
Route::post('lecture/create', [LectureController::class,'createLecture']) ->name('images.poster');
Route::delete('lecture/delete/{id}', [LectureController::class,'deleteLecture']);

Route::get('post/get/{id}', [PostController::class,'readPost']);
Route::post('post/create', [PostController::class,'createPost']);
Route::delete('post/delete/{id}', [PostController::class,'deletePost']);



