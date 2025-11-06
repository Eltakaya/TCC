<?php

namespace App\Http\Controllers;

use App\Models\TipoCriterio;
use App\Models\Criterio; // <-- 1. Precisamos disso para o dropdown
use Illuminate\Http\Request;

class TipoCriterioController extends Controller
{
    /**
     * Mostra a lista de opções.
     */
    public function index()
    {
        // Usamos 'with' para já buscar o 'criterio' relacionado
        $tipoCriterios = TipoCriterio::with('criterio')->latest()->get();
        return view('tipo_criterios.index', compact('tipoCriterios'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        // 2. Busca todos os Critérios (perguntas) para o <select>
        $criterios = Criterio::all();
        return view('tipo_criterios.create', compact('criterios'));
    }

    /**
     * Salva no banco.
     */
    public function store(Request $request)
    {
        $request->validate([
            'criterios_id' => 'required|exists:criterios,id', // Valida se a pergunta existe
            'descricao' => 'required|string|max:200',
            'valor' => 'required|integer|min:0', // A pontuação da opção
        ]);

        TipoCriterio::create($request->all());

        return redirect()->route('tipo_criterios.index')->with('success', 'Opção de Critério criada com sucesso!');
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit(TipoCriterio $tipoCriterio)
    {
        // 3. Precisamos da opção específica e da lista de perguntas
        $criterios = Criterio::all();
        return view('tipo_criterios.edit', compact('tipoCriterio', 'criterios'));
    }

    /**
     * Atualiza no banco.
     */
    public function update(Request $request, TipoCriterio $tipoCriterio)
    {
        $request->validate([
            'criterios_id' => 'required|exists:criterios,id',
            'descricao' => 'required|string|max:200',
            'valor' => 'required|integer|min:0',
        ]);

        $tipoCriterio->update($request->all());

        return redirect()->route('tipo_criterios.index')->with('success', 'Opção de Critério atualizada com sucesso!');
    }

    /**
     * Deleta do banco.
     */
    public function destroy(TipoCriterio $tipoCriterio)
    {
        $tipoCriterio->delete();
        return redirect()->route('tipo_criterios.index')->with('success', 'Opção de Critério excluída com sucesso!');
    }
}