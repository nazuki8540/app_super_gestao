<?php

// use App\Http\Middleware\LogAcessoMiddelware;
use Illuminate\Support\Facades\Route;

 


Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class,'sobrenos'])->name('site.sobrenos');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class,'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'autenticar'])->name('site.login');
Route::middleware('autenticacao:ldap')
    ->prefix('/app')->group(function() {
        //inicio
        Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('app.home');
        Route::get('/sair', [\App\Http\Controllers\LoginController::class,'sair'])->name('app.sair');
        //fornecedor
        Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class,'index'])->name('app.fornecedor');
        Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class,'listar'])->name('app.fornecedor.listar');
        Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class,'listar'])->name('app.fornecedor.listar');
        Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
        Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
        Route::get('/fornecedor/editar/{id}/{msn?}', [\App\Http\Controllers\FornecedorController::class,'editar'])->name('app.fornecedor.editar');
        Route::get('/fornecedor/excluir/{id}/{msn?}', [\App\Http\Controllers\FornecedorController::class,'excluir'])->name('app.fornecedor.excluir');
        //produtos
        Route::resource('produto', \App\Http\Controllers\ProdutoController::class);
        //produto detalhes
        Route::resource('produto-detalhe', \App\Http\Controllers\ProdutoDetalheController::class);

        Route::resource('cliente', \App\Http\Controllers\ClienteController::class);
        Route::resource('pedido', \App\Http\Controllers\PedidoController::class);
        // Route::resource('pedido-produto', \App\Http\Controllers\PedidoProdutoController::class);
        Route::get('pedido-produto/create/{pedido}',[\App\Http\Controllers\PedidoProdutoController::class,'create'])->name('pedido-produto.create');
        Route::post('pedido-produto/store/{pedido}',[\App\Http\Controllers\PedidoProdutoController::class,'store'])->name('pedido-produto.store');
});

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class,'teste'])->name('teste');

Route::fallback(function(){
    echo 'A rota acessada não existe! <a href="/">Clique aqui</a> para ir para página inicial';
});