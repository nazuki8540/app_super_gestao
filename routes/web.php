<?php

// use App\Http\Middleware\LogAcessoMiddelware;
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

Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class,'sobrenos'])->name('site.sobrenos');
Route::get('/login', [\App\Http\Controllers\SobreNosController::class,'login'])->name('site.login');

Route::middleware('autenticacao:ldap')
    ->prefix('/app')->group(function() {
        Route::get('/clientes', [\App\Http\Controllers\ClientesController::class,'clientes'])->name('app.clientes');
        Route::get('/fornecedores', [\App\Http\Controllers\FornecedoresController::class,'fornecedores'])->name('app.fornecedores@index');
        Route::get('/produtos', [\App\Http\Controllers\ProdutosController::class,'produtos'])->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class,'teste'])->name('teste');

Route::fallback(function(){
    echo 'A rota acessada não existe! <a href="/">Clique aqui</a> para ir para página inicial';
});