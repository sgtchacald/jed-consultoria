<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModuloController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;

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

route::group(['middleware' => ['auth'],'namespace'  => 'Admin'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get ('admin/modulo', [ModuloController::class, 'index'])->name('modulo.selecionar');
    Route::get ('admin/modulo/cadastrar', [ModuloController::class, 'create'])->name('modulo.cadastrar');
    Route::post('admin/modulo/insert', 'ModuloController@store')->name('modulo.insert');
    Route::get ('admin/modulo/editar/{id}', 'ModuloController@edit')->name('modulo.editar');
    Route::put ('admin/modulo/update', 'ModuloController@update')->name('modulo.update');
    Route::put ('admin/modulo/excluir/{id}', 'ModuloController@destroy')->name('modulo.excluir');
    Route::get ('admin/modulo/getmoduloorderby', 'ModuloController@getModulosOrderBy')->name('modulo.getmoduloorderby');
    Route::get ('admin/modulo/getmodulobyid/{idmodulo}', 'ModuloController@getModuloById')->name('modulo.getmodulobyid');
});

Auth::routes();
Route::get('/', function () {return view('site.index');});
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/home',  [HomeController::class, 'index'])->name('home');
