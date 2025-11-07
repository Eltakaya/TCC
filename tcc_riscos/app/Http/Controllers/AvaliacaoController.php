<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Evento;
use App\Models\TipoRisco;
use App\Models\Criterio; 
use App\Models\TipoCriterio; 
use App\Models\RespostaAvaliacao; 
use App\Models\Classificacao; // <-- 1. PRECISAMOS IMPORTAR O MODEL DE CLASSIFICAÇÃO
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon; 

class AvaliacaoController extends Controller
{
    /**
     * Mostra o formulário para criar uma nova avaliação (a "calculadora").
     * (Este método continua o mesmo)
     */
    public function create(Evento $evento)
    {
        $tiposDeRisco = TipoRisco::with(['criterios', 'criterios.tipoCriterios'])
                                 ->get();

        return view('avaliacoes.create', compact('evento', 'tiposDeRisco'));
    }

    /**
     * Salva a nova avaliação no banco (A "Calculadora").
     * (Este método foi atualizado)
     */
    public function store(Request $request, Evento $evento)
    {
        // --- 1. VALIDAÇÃO ---
        $criteriosIds = Criterio::pluck('id')->toArray();
        
        $request->validate([
            'respostas' => 'required|array',
            'respostas.*' => 'required',
            'respostas' => 'array|size:' . count($criteriosIds)
        ], [
            'respostas.size' => 'Você deve responder todas as perguntas do formulário.'
        ]);


        // --- 2. CÁLCULO DA PONTUAÇÃO ---
        $pontuacaoTotal = 0;
        $respostasDoUsuario = $request->input('respostas', []);
        $opcoesSelecionadas = TipoCriterio::whereIn('id', $respostasDoUsuario)->get();

        foreach ($opcoesSelecionadas as $opcao) {
            $pontuacaoTotal += $opcao->valor;
        }

        // --- 2.5 "UPGRADE": ENCONTRAR A CLASSIFICAÇÃO (NOVO BLOCO) ---
        // Busca a classificação onde a pontuação está entre o Mínimo e o Máximo
        $classificacao = Classificacao::where('intervalo_min', '<=', $pontuacaoTotal)
                                      ->where('intervalo_max', '>=', $pontuacaoTotal)
                                      ->first(); // Pega o primeiro que encontrar

        // Se encontrarmos, pegamos o ID. Se não (caso o gestor não tenha cadastrado), deixamos nulo.
        $classificacaoId = $classificacao ? $classificacao->id : null;
        
        // --- 3. SALVAR NO BANCO (USANDO TRANSACTION) ---
        try {
            DB::beginTransaction(); 

            // 3.1. Cria a Avaliação principal (AGORA COM O 'classificacoes_id')
            $avaliacao = Avaliacao::create([
                'data_avaliacao' => Carbon::now(), 
                'pontuacao_total' => $pontuacaoTotal,
                'eventos_id' => $evento->id,
                'classificacoes_id' => $classificacaoId, // <-- MUDANÇA AQUI
            ]);

            // 3.2. Prepara as respostas individuais para salvar
            $respostasParaSalvar = [];
            foreach ($opcoesSelecionadas as $opcao) {
                $respostasParaSalvar[] = [
                    'avaliacoes_id' => $avaliacao->id,
                    'tipo_criterios_id' => $opcao->id,
                    'valor_atribuido' => $opcao->valor, 
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            // 3.3. Salva todas as respostas individuais de uma vez
            RespostaAvaliacao::insert($respostasParaSalvar);

            DB::commit(); 

        } catch (\Exception $e) {
            DB::rollBack(); 
            return back()->with('error', 'Houve um erro ao salvar sua avaliação. Tente novamente.');
        }

        // --- 4. REDIRECIONAR (COM MENSAGEM DE SUCESSO MELHORADA) ---
        // Monta a mensagem de sucesso
        $mensagemSucesso = 'Evento avaliado com sucesso! Pontuação: ' . $pontuacaoTotal;
        
        // Se encontramos uma classificação, adiciona ela na mensagem
        if ($classificacao) {
            $mensagemSucesso .= ' (Classificação: ' . $classificacao->tipo_class . ')';
        }

        return redirect()->route('eventos.index')->with('success', $mensagemSucesso);
    }
}