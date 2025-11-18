<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para saber quem está logado
use App\Models\Avaliacao; // Precisamos buscar as avaliações
use Carbon\Carbon; // Para verificar a data (eventos passados)

class DashboardController extends Controller
{
    /**
     * Mostra o dashboard com o histórico de eventos.
     */
    public function index()
    {
        // Buscamos TODAS as avaliações feitas pelo usuário
        // (Não importa se o evento já passou ou se será no futuro)
        $avaliacoes = Avaliacao::whereHas('evento', function($query) {
            // Garante que o evento pertence ao usuário logado
            $query->where('user_id', Auth::id());
        })
        // Trazemos os dados relacionados
        ->with(['evento', 'classificacao', 'planoMitigacao'])
        // Ordenamos pela data em que a AVALIAÇÃO foi feita (mais recente primeiro)
        ->latest('data_avaliacao')
        ->get();

        // Enviamos para a view (mudei o nome da variável para $avaliacoes)
        return view('dashboard', compact('avaliacoes'));
    }
}