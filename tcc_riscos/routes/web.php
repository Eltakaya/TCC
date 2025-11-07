<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TipoRiscoController; 
use App\Http\Controllers\CriterioController; 
use App\Http\Controllers\TipoCriterioController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\ClassificacaoController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanoMitigacaoController; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// ROTAS PARA USUÁRIOS AUTENTICADOS (Organizadores e Gestores)
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de Eventos (para Organizadores)
    Route::resource('eventos', EventoController::class); // <-- CORRIGIDO
    
    // Rota para MOSTRAR o formulário de avaliação
    Route::get('/eventos/{evento}/avaliar', [AvaliacaoController::class, 'create'])
        ->name('avaliacoes.create');
    
    // Rota para SALVAR (e calcular) a avaliação
    Route::post('/eventos/{evento}/avaliar', [AvaliacaoController::class, 'store'])
        ->name('avaliacoes.store');

    // Rota para MOSTRAR o formulário de criação do plano
    Route::get('/avaliacoes/{avaliacao}/plano/criar', [PlanoMitigacaoController::class, 'create'])
        ->name('planos.create');
    
    // Rota para SALVAR o novo plano no banco
    Route::post('/avaliacoes/{avaliacao}/plano', [PlanoMitigacaoController::class, 'store'])
        ->name('planos.store');
});


// ROTAS SOMENTE PARA 'GESTOR' (ADMIN)
Route::middleware(['auth', 'role:gestor'])->group(function () {
    // O 'role:gestor' usa o 'porteiro' que criamos.

    Route::resource('tipo_riscos', TipoRiscoController::class); // <-- CORRIGIDO
    Route::resource('criterios', CriterioController::class); // <-- CORRIGIDO
    Route::resource('tipo_criterios', TipoCriterioController::class); // <-- CORRIGIDO
    Route::resource('classificacoes', ClassificacaoController::class)->parameters(['classificacoes' => 'classificacao']);
});


require __DIR__.'/auth.php';