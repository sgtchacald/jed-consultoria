<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\ModuloController;
use App\Http\Controllers\Admin\LinksUteisController;
use App\Http\Controllers\Admin\ServicosController;
use App\Http\Controllers\Admin\ParametroGlobalController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Site\SiteController;

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

//Rotas para a administração do site
route::group(['middleware' => ['auth'],'namespace'  => 'Admin'],function(){
    Route::get('/administracao', [AdminController::class, 'index'])->name('administracao');
    Route::get('/home', [AdminController::class, 'index'])->name('home');

    //Crud de Usuários do sistema
    Route::get ('admin/usuarios', [UsuariosController::class, 'index'])->name('usuarios.selecionar');
    Route::get ('admin/usuarios/cadastrar', [UsuariosController::class, 'create'])->name('usuarios.cadastrar');
    Route::post('admin/usuarios/insert', [UsuariosController::class, 'store'])->name('usuarios.insert');
    Route::get ('admin/usuarios/editar/{id}', [UsuariosController::class, 'edit'])->name('usuarios.editar');
    Route::put ('admin/usuarios/update', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::get ('admin/usuarios/validaseexistenome/{nome}/{id}', [UsuariosController::class, 'validaSeExisteNome'])->name('usuarios.valida.existe.nome');
    Route::put ('admin/usuarios/excluir/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.excluir');
    Route::get ('admin/usuarios/getusuariosorderby', [UsuariosController::class, 'getServicosOrderBy'])->name('usuarios.getusuariosorderby');
    Route::get ('admin/usuarios/getServicobyid/{idServico}', [UsuariosController::class, 'getLinkUtilById'])->name('usuarios.getServicobyid');
    Route::get ('admin/usuarios/imagem/{strImagem}', [UsuariosController::class, 'getImagem'])->name('usuarios.getImagem');

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

    //Crud de Serviços do site
    Route::get ('admin/servicos', [ServicosController::class, 'index'])->name('servicos.selecionar');
    Route::get ('admin/servicos/cadastrar', [ServicosController::class, 'create'])->name('servicos.cadastrar');
    Route::post('admin/servicos/insert', [ServicosController::class, 'store'])->name('servicos.insert');
    Route::get ('admin/servicos/editar/{id}', [ServicosController::class, 'edit'])->name('servicos.editar');
    Route::put ('admin/servicos/update', [ServicosController::class, 'update'])->name('servicos.update');
    Route::put ('admin/servicos/excluir/{id}', [ServicosController::class, 'destroy'])->name('servicos.excluir');
    Route::get ('admin/servicos/validaseexistenome/{nome}/{id}', [ServicosController::class, 'validaSeExisteNome'])->name('servicos.valida.existe.nome');
    Route::get ('admin/servicos/getservicosorderby', [ServicosController::class, 'getServicosOrderBy'])->name('servicos.getservicosorderby');
    Route::get ('admin/servicos/getServicobyid/{idServico}', [ServicosController::class, 'getLinkUtilById'])->name('servicos.getServicobyid');
    Route::get ('admin/servicos/imagem/{strImagem}', [ServicosController::class, 'getImagem'])->name('servicos.getImagem');

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

//Rotas para autenticação
Auth::routes();

/**Rotas para o site**/

//Pagina "principal"
Route::get('/', [SiteController::class, 'index'])->name('site.index');

//Pagina "sobre a empresa"
Route::get('/sobre', [SiteController::class, 'abrirPaginaSobre'])->name('site.sobre');
Route::get('/getservicosfilhosbyidpai/{idPai}', [ServicosController::class, 'getServicosFilhosByIdPai'])->name('site.getservicosfilhosbyidpai');
Route::get('/modalservicos', function () {return view('site.listaHierarquica');})->name('site.servicos.modalservico');
Route::get ('/imagem/{strImagem}', [UsuarioController::class, 'getImagem'])->name('servicos.getImagem');

//Página "contato"
Route::get('/contato', [SiteController::class, 'abrirPaginaContato'])->name('site.contato');




