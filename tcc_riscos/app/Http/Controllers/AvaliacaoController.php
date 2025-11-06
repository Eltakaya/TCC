<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Evento;
use App\Models\TipoRisco;
use App\Models\Criterio; // <-- 1. Importar Criterio (para validação)
use App\Models\TipoCriterio; // <-- 2. Importar TipoCriterio (para buscar o valor)
use App\Models\RespostaAvaliacao; // <-- 3. Importar RespostaAvaliacao (para salvar)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- 4. Importar o DB (para Transactions)
use Carbon\Carbon; // <-- 5. Importar o Carbon (para datas)

class AvaliacaoController extends Controller
{
    /**
     * Mostra o formulário para criar uma nova avaliação (a "calculadora").
     */
    public function create(Evento $evento)
    {
        $tiposDeRisco = TipoRisco::with(['criterios', 'criterios.tipoCriterios'])
                                ->get();

        return view('avaliacoes.create', compact('evento', 'tiposDeRisco'));
    }

    /**
     * Salva a nova avaliação no banco (A "Calculadora").
     */
    public function store(Request $request, Evento $evento)
    {
        // --- 1. VALIDAÇÃO ---
        // Pega todos os IDs dos critérios (perguntas) que foram exibidos no formulário
        $criteriosIds = Criterio::pluck('id')->toArray();
        
        // Regras de validação:
        // 'respostas' deve ser um array
        // 'respostas.*' (cada item dentro de 'respostas') deve ser 'required'
        $request->validate([
            'respostas' => 'required|array',
            'respostas.*' => 'required',
            // Garante que o usuário respondeu a todas as perguntas
            'respostas' => 'array|size:' . count($criteriosIds)
        ], [
            // Mensagem de erro customizada
            'respostas.size' => 'Você deve responder todas as perguntas do formulário.'
        ]);


        // --- 2. CÁLCULO DA PONTUAÇÃO ---
        $pontuacaoTotal = 0;
        // Pega o array de respostas (ex: [criterio_id => tipocriterio_id])
        $respostasDoUsuario = $request->input('respostas', []);
        
        // Busca no banco todas as Opções que o usuário selecionou
        // Isso é muito mais performático que fazer um loop e 100 buscas no banco
        $opcoesSelecionadas = TipoCriterio::whereIn('id', $respostasDoUsuario)->get();

        // Itera sobre as opções que encontramos e soma o 'valor' de cada uma
        foreach ($opcoesSelecionadas as $opcao) {
            $pontuacaoTotal += $opcao->valor;
        }

        // --- 3. SALVAR NO BANCO (USANDO TRANSACTION) ---
        try {
            DB::beginTransaction(); // Inicia a "operação segura"

            // 3.1. Cria a Avaliação principal
            $avaliacao = Avaliacao::create([
                'data_avaliacao' => Carbon::now(), // Data de hoje
                'pontuacao_total' => $pontuacaoTotal,
                'eventos_id' => $evento->id,
                // 'classificacoes_id' ainda fica null, faremos isso no futuro
            ]);

            // 3.2. Prepara as respostas individuais para salvar
            $respostasParaSalvar = [];
            foreach ($opcoesSelecionadas as $opcao) {
                $respostasParaSalvar[] = [
                    'avaliacoes_id' => $avaliacao->id,
                    'tipo_criterios_id' => $opcao->id,
                    'valor_atribuido' => $opcao->valor, // Salva o valor da opção no momento
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            // 3.3. Salva todas as respostas individuais de uma vez
            RespostaAvaliacao::insert($respostasParaSalvar);

            DB::commit(); // Confirma a operação (tudo foi salvo com sucesso)

        } catch (\Exception $e) {
            DB::rollBack(); // Desfaz a operação (algo deu errado)
            
            // Retorna para o formulário com uma mensagem de erro
            return back()->with('error', 'Houve um erro ao salvar sua avaliação. Tente novamente.');
        }

        // --- 4. REDIRECIONAR ---
        // Se tudo deu certo, redireciona para a lista de eventos
        return redirect()->route('eventos.index')->with('success', 'Evento avaliado com sucesso! Pontuação: ' . $pontuacaoTotal);
    }
}