<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TipoRiscoController; 
use App\Http\Controllers\CriterioController; 
use App\Http\Controllers\TipoCriterioController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\ClassificacaoController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ROTAS PARA USUÁRIOS AUTENTICADOS (Organizadores e Gestores)
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de Eventos (para Organizadores)
    Route::resource('eventos', EventoController::class);
    
    // <-- 2. ADICIONE ESTE BLOCO PARA AVALIAÇÕES
    // Rota para MOSTRAR o formulário de avaliação
    Route::get('/eventos/{evento}/avaliar', [AvaliacaoController::class, 'create'])
        ->name('avaliacoes.create');
    
    // Rota para SALVAR (e calcular) a avaliação
    Route::post('/eventos/{evento}/avaliar', [AvaliacaoController::class, 'store'])
        ->name('avaliacoes.store');
});


// <-- 2. ADICIONAR ESTE NOVO GRUPO INTEIRO
// ROTAS SOMENTE PARA 'GESTOR' (ADMIN)
Route::middleware(['auth', 'role:gestor'])->group(function () {
    // O 'role:gestor' usa o 'porteiro' que criamos.

    // Rota para o CRUD de Tipo de Riscos
    Route::resource('tipo_riscos', TipoRiscoController::class);
    Route::resource('criterios', CriterioController::class);
    Route::resource('tipo_criterios', TipoCriterioController::class);
    Route::resource('classificacoes', ClassificacaoController::class);
    // (No futuro, colocaremos os outros CRUDs de admin aqui dentro)
});


require __DIR__.'/auth.php';