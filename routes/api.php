<?php

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


//posts
Route::get('/post', [App\Http\Controllers\Api\PostController::class, 'index']);
Route::get('/post/{id?}', [App\Http\Controllers\Api\PostController::class, 'show']);
Route::get('/homepage/post', [App\Http\Controllers\Api\PostController::class, 'PostHomePage']);

//berita
Route::get('/berita', [App\Http\Controllers\Api\BeritaController::class, 'index']); 
Route::get('/berita/{id?}', [App\Http\Controllers\Api\BeritaController::class, 'show']);
Route::get('/beranda/berita', [App\Http\Controllers\Api\BeritaController::class, 'BeritaHomePage']);

//Data Statis
Route::get('/datastatis', [App\Http\Controllers\Api\DataStatisController::class, 'index']);
Route::get('/datastatis/{id?}', [App\Http\Controllers\Api\DataStatisController::class, 'show']);
Route::get('/beranda/datastatis', [App\Http\Controllers\Api\DataStatisController::class, 'DataStatisHomePage']);


//Agenda
Route::get('/event', [App\Http\Controllers\Api\AgendaController::class, 'index']);
Route::get('/event/{slug?}', [App\Http\Controllers\Api\AgendaController::class, 'show']);
Route::get('/homepage/event', [App\Http\Controllers\Api\AgendaController::class, 'AgendaHomePage']);

//slider
Route::get('/slider', [App\Http\Controllers\Api\SliderController::class, 'index']);

//Banner
Route::get('/bannerlink', [App\Http\Controllers\Api\BannerController::class, 'bannerlink']);
Route::get('/banneriklan', [App\Http\Controllers\Api\BannerController::class, 'banneriklan']);

//Album
Route::get('/album', [App\Http\Controllers\Api\AlbumController::class, 'index']);

//tags
Route::get('/tag', [App\Http\Controllers\Api\TagController::class, 'index']);
Route::get('/tag/{slug?}', [App\Http\Controllers\Api\TagController::class, 'show']);

//category
Route::get('/category', [App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('/category/{slug?}', [App\Http\Controllers\Api\CategoryController::class, 'show']);

//photo
Route::get('/photo', [App\Http\Controllers\Api\PhotoController::class, 'index']);
Route::get('/homepage/photo', [App\Http\Controllers\Api\PhotoController::class, 'PhotoHomepage']);

//video
Route::get('/video', [App\Http\Controllers\Api\VideoController::class, 'index']);
Route::get('/homepage/video', [App\Http\Controllers\Api\VideoController::class, 'VideoHomepage']);