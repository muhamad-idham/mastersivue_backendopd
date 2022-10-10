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


//berita
Route::get('/berita', [App\Http\Controllers\Api\BeritaController::class, 'index']); 
Route::get('/berita/{id?}', [App\Http\Controllers\Api\BeritaController::class, 'show']);
Route::get('/beranda/berita', [App\Http\Controllers\Api\BeritaController::class, 'BeritaHomePage']);

//Data Statis
Route::get('/datastatis', [App\Http\Controllers\Api\DataStatisController::class, 'index']);
Route::get('/datastatis/{id?}', [App\Http\Controllers\Api\DataStatisController::class, 'show']);
Route::get('/beranda/datastatis', [App\Http\Controllers\Api\DataStatisController::class, 'DataStatisHomePage']);


//Agenda
Route::get('/agenda', [App\Http\Controllers\Api\AgendaController::class, 'index']);
Route::get('/agenda/{slug?}', [App\Http\Controllers\Api\AgendaController::class, 'show']);
Route::get('/homepage/agenda', [App\Http\Controllers\Api\AgendaController::class, 'AgendaHomePage']);

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

//Kategori Berita
Route::get('/kategoriberita', [App\Http\Controllers\Api\KategoriBeritaController::class, 'index']);
Route::get('/kategoriberita/{slug?}', [App\Http\Controllers\Api\KategoriBeritaController::class, 'show']);

//foto
Route::get('/foto', [App\Http\Controllers\Api\FotoController::class, 'index']);
Route::get('/homepage/foto', [App\Http\Controllers\Api\FotoController::class, 'FotoHomepage']);

//video
Route::get('/video', [App\Http\Controllers\Api\VideoController::class, 'index']);
Route::get('/homepage/video', [App\Http\Controllers\Api\VideoController::class, 'VideoHomepage']);