<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\TesteController;

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
#ROTAS DA APP
Route::middleware(['log.acesso', 'autenticacao'])
    ->prefix('app')->group(function () {
        Route::get(
            "/fornecedor",
            [FornecedorController::class, 'index']
        )->name('app.fornecedor');
        Route::get(
            "/produto",
            [FornecedorController::class, 'create']
        )->name('app.produto');
    });

#ROTAS DO SITE
Route::prefix('site')->group(function () {
    Route::get('/', [PrincipalController::class, 'principal'])
        ->name('site.index');

    Route::get('/sobrenos', [SobreNosController::class, 'sobreNos'])
        ->name('site.sobrenos')
        ->middleware('log.acesso');

    Route::get('/contato', [ContatoController::class, 'contato'])
        ->name('site.contato')->middleware('autenticacao:padrao');

    Route::post('/contato', [ContatoController::class, 'save'])
        ->name('site.contato');
});

Route::get(
    '/teste/{nome}/{idade}',
    [TesteController::class, 'teste']
)->name('teste');

#ROTAS FALLBACK
Route::fallback(function () {
    echo 'A página solicitada não existe, 
    <a href="' . route('site.index') . '">
    clique aqui</a> para voltar a página inicial.';
});


