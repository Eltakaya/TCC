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
        $avaliacoes = Avaliacao::whereHas('evento', function($query) {
            $query->where('user_id', Auth::id());
        })
        // CARREGAMENTO AVANÇADO (Eager Loading)
        // Precisamos buscar lá no fundo: Resposta -> Opção -> Pergunta -> Tipo de Risco
        ->with(['evento', 'classificacao', 'planoMitigacao', 'respostas.tipoCriterio.criterio.tipoRisco'])
        ->latest('data_avaliacao')
        ->get();

        // --- PREPARAR DADOS PARA O GRÁFICO ---
        foreach ($avaliacoes as $avaliacao) {
            $dadosGrafico = [];
            $totalPontos = $avaliacao->pontuacao_total > 0 ? $avaliacao->pontuacao_total : 1; // Evita divisão por zero

            // Agrupa as respostas pelo Tipo de Risco
            foreach ($avaliacao->respostas as $resposta) {
                // Pega o nome da categoria
                $categoriaOriginal = $resposta->tipoCriterio->criterio->tipoRisco->risco;
                
                // --- TRUQUE DO APELIDO ---
                // Se o nome for muito longo, usamos um apelido curto
                $categoria = match ($categoriaOriginal) {
                    'TÉCNICOS E ESTRUTURAIS' => 'TÉCNICOS', // Troca o longo pelo curto
                    'TECNICOS E ESTRUTURAIS' => 'TÉCNICOS', // (Previne caso esteja sem acento)
                    default => $categoriaOriginal, // Para os outros (Humanos, Naturais), mantém igual
                };

                $valor = $resposta->valor_atribuido;

                if (!isset($dadosGrafico[$categoria])) {
                    $dadosGrafico[$categoria] = 0;
                }
                $dadosGrafico[$categoria] += $valor;
            }

            // Converte pontos em porcentagem e separa em arrays para o Chart.js
            $labels = [];
            $data = [];
            foreach ($dadosGrafico as $cat => $pontos) {
                $labels[] = $cat;
                // Calcula a % (Pontos da Categoria / Total do Evento * 100)
                $data[] = round(($pontos / $totalPontos) * 100, 1); 
            }

            // Salva esses arrays "temporários" dentro do objeto avaliacao para usar na View
            $avaliacao->chartLabels = $labels;
            $avaliacao->chartData = $data;
        }

        return view('dashboard', compact('avaliacoes'));
    }
}