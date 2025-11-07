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
        // Esta é a consulta principal:
        // 1. Buscamos todas as Avaliações...
        $avaliacoesPassadas = Avaliacao::whereHas('evento', function($query) {
            // 2. ...que pertencem a eventos do usuário logado...
            $query->where('user_id', Auth::id())
                  // 3. ...e que já terminaram (data_fim é anterior a agora).
                  ->where('data_fim', '<', Carbon::now());
        })
        // 4. Já trazemos os dados relacionados para não sobrecarregar o banco
        ->with(['evento', 'classificacao', 'planoMitigacao'])
        // 5. Ordenamos pela data da avaliação mais recente
        ->latest('data_avaliacao')
        ->get();

        // 6. Enviamos os dados para a view
        return view('dashboard', compact('avaliacoesPassadas'));
    }
}