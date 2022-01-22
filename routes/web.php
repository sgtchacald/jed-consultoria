<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModuloController;
use App\Http\Controllers\Admin\LinksUteisController;
use App\Http\Controllers\Admin\ParametroGlobalController;
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

    //Crud de Modulos do sistema
    Route::get ('admin/modulo', [ModuloController::class, 'index'])->name('modulo.selecionar');
    Route::get ('admin/modulo/cadastrar', [ModuloController::class, 'create'])->name('modulo.cadastrar');
    Route::post('admin/modulo/insert', [ModuloController::class, 'store'])->name('modulo.insert');
    Route::get ('admin/modulo/editar/{id}', [ModuloController::class, 'edit'])->name('modulo.editar');
    Route::put ('admin/modulo/update', [ModuloController::class, 'update'])->name('modulo.update');
    Route::put ('admin/modulo/excluir/{id}', [ModuloController::class, 'destroy'])->name('modulo.excluir');
    Route::get ('admin/modulo/getmoduloorderby', [ModuloController::class, 'getModulosOrderBy'])->name('modulo.getmoduloorderby');
    Route::get ('admin/modulo/getmodulobyid/{idmodulo}', [ModuloController::class, 'getModuloById'])->name('modulo.getmodulobyid');

    //Crud de Links Úteis do site
    Route::get ('admin/linksuteis', [LinksUteisController::class, 'index'])->name('linksUteis.selecionar');
    Route::get ('admin/linksuteis/cadastrar', [LinksUteisController::class, 'create'])->name('linksUteis.cadastrar');
    Route::post('admin/linksuteis/insert', [LinksUteisController::class, 'store'])->name('linksUteis.insert');
    Route::get ('admin/linksuteis/editar/{id}', [LinksUteisController::class, 'edit'])->name('linksUteis.editar');
    Route::put ('admin/linksuteis/update', [LinksUteisController::class, 'update'])->name('linksUteis.update');
    Route::put ('admin/linksuteis/excluir/{id}', [LinksUteisController::class, 'destroy'])->name('linksUteis.excluir');
    Route::get ('admin/linksuteis/getlinksuteisorderby', [LinksUteisController::class, 'getLinksUteisOrderBy'])->name('linksUteis.getlinksuteisorderby');
    Route::get ('admin/linksuteis/getlinkutilbyid/{idlinkutil}', [LinksUteisController::class, 'getLinkUtilById'])->name('linksUteis.getlinkutilbyid');

     //Crud de Parametros do sistema
     Route::get ('admin/parametro', [ParametroGlobalController::class, 'index'])->name('parametro.selecionar');
     Route::get ('admin/parametro/cadastrar', [ParametroGlobalController::class, 'create'])->name('parametro.cadastrar');
     Route::post('admin/parametro/insert', [ParametroGlobalController::class, 'store'])->name('parametro.insert');
     Route::get ('admin/parametro/editar/{id}', [ParametroGlobalController::class, 'edit'])->name('parametro.editar');
     Route::put ('admin/parametro/update', [ParametroGlobalController::class, 'update'])->name('parametro.update');
     Route::put ('admin/parametro/excluir/{id}', [ParametroGlobalController::class, 'destroy'])->name('parametro.excluir');
     Route::get ('admin/parametro/getparametroorderby', [ParametroGlobalController::class, 'getParametrosOrderBy'])->name('parametro.getparametroorderby');
     Route::get ('admin/parametro/getparametrobyid/{idparametro}', [ParametroGlobalController::class, 'getParametroById'])->name('parametro.getparametrobyid');
});

Auth::routes();
Route::get('/', function () {return view('site.index');});
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/home',  [HomeController::class, 'index'])->name('home');
