<?php

namespace App\Http\Controllers;

use App\Models\PlanoMitigacao;
use App\Models\Avaliacao; // Precisamos receber a Avaliação
use Illuminate\Http\Request;
use Carbon\Carbon; // Para a data de criação

class PlanoMitigacaoController extends Controller
{
    /**
     * Mostra o formulário para criar um novo Plano de Mitigação.
     */
    public function create(Avaliacao $avaliacao)
    {
        // Carrega os dados do evento e da classificação
        $avaliacao->load('evento', 'classificacao');
        
        // Pega as "Ações Recomendadas" que cadastramos no (Passo 33)
        $recomendacoes = $avaliacao->classificacao->acoes_recomendadas ?? '';

        return view('planos_mitigacao.create', compact('avaliacao', 'recomendacoes'));
    }

    /**
     * Salva o novo Plano de Mitigação no banco.
     */
    public function store(Request $request, Avaliacao $avaliacao)
    {
        // 1. Validação
        $request->validate([
            'descricao' => 'required|string|min:10',
        ]);

        // 2. Verifica se já existe um plano (só para garantir)
        if ($avaliacao->planoMitigacao) {
            return redirect()->route('dashboard')->with('error', 'Este evento já possui um plano de mitigação.');
        }

        // 3. Cria o novo plano
        PlanoMitigacao::create([
            'descricao' => $request->descricao,
            'data_criacao' => Carbon::now(),
            'avaliacoes_id' => $avaliacao->id,
        ]);

        // 4. Redireciona de volta para o Dashboard
        return redirect()->route('dashboard')->with('success', 'Plano de Mitigação salvo com sucesso!');
    }
}