<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'ShowLoginForm']);

Auth::routes(['register' => false]);

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function(){

        //dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        //permissions
        Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class, ['except' => ['show', 'create', 'edit', 'update', 'delete'] ,'as' => 'admin']);

        //roles
        Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'] ,'as' => 'admin']);

        //users
        Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'] ,'as' => 'admin']);

        //tags
        Route::resource('/tag', App\Http\Controllers\Admin\TagController::class, ['except' => 'show' ,'as' => 'admin']);

        // Agenda
        Route::resource('/agenda', App\Http\Controllers\Admin\AgendaController::class, ['except' => 'show' ,'as' => 'admin']);

        //dokumen
        Route::resource('/dokumen', App\Http\Controllers\Admin\DokumenController::class, ['except' => 'show' ,'as' => 'admin']);

        //Banner
        Route::resource('/banner', App\Http\Controllers\Admin\BannerController::class, ['except' => 'show' ,'as' => 'admin']);

        //berita
        Route::resource('/berita', App\Http\Controllers\Admin\BeritaController::class, ['except' => 'show' ,'as' => 'admin']);

        //data statis
        Route::resource('/datastatis', App\Http\Controllers\Admin\DatastatisController::class, ['except' => 'show' ,'as' => 'admin']);


        //kategori berita
        Route::resource('/kategoriberita', App\Http\Controllers\Admin\KategoriBeritaController::class, ['except' => 'show' ,'as' => 'admin']);
        
        //kategori data
        Route::resource('/kategoridata', App\Http\Controllers\Admin\KategoriDataController::class, ['except' => 'show' ,'as' => 'admin']);

        //kategori Banner
        Route::resource('/kategoribanner', App\Http\Controllers\Admin\KategoriBannerController::class, ['except' => 'show' ,'as' => 'admin']);

        //kategori album
        Route::resource('/album', App\Http\Controllers\Admin\AlbumController::class, ['except' => 'show' ,'as' => 'admin']);

        //foto
        Route::resource('/foto', App\Http\Controllers\Admin\FotoController::class, ['except' => 'show' ,'as' => 'admin']);

        //video
        Route::resource('/video', App\Http\Controllers\Admin\VideoController::class, ['except' => 'show' ,'as' => 'admin']);
    
        //slider
        // Route::resource('/slider', App\Http\Controllers\Admin\SliderController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);
        Route::resource('/slider', App\Http\Controllers\Admin\SliderController::class, ['except' => 'show' ,'as' => 'admin']);

        // Route::group(['prefix' => 'tags'], function() {
        //     Route::get('/', [\App\Http\Controllers\Admin\TagsController::class, 'index'])->name('admin.tags.index');
        //     Route::get('/create', [App\Http\Controllers\Admin\TagsController::class, 'create'])->name('admin.tags.create');
        //     Route::post('/store', [App\Http\Controllers\Admin\TagsController::class, 'store'])->name('admin.tags.store');
        //     Route::get('/edit/{id}', [App\Http\Controllers\Admin\TagsController::class, 'edit'])->name('admin.tags.edit');
        //     Route::put('/update/{id}', [App\Http\Controllers\Admin\TagsController::class, 'update'])->name('admin.tags.update');
        //     Route::delete('/{id}', [App\Http\Controllers\Admin\TagsController::class, 'destroy'])->name(('admin.tags.destroy'));
        // });

    });

});