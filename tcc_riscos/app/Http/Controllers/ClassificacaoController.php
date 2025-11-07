<?php

namespace App\Http\Controllers;

use App\Models\Classificacao;
use Illuminate\Http\Request;

class ClassificacaoController extends Controller
{
    public function index()
    {
        $classificacoes = Classificacao::latest()->get();
        return view('classificacoes.index', compact('classificacoes'));
    }

    public function create()
    {
        return view('classificacoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_class' => 'required|string|max:100|unique:classificacoes',
            'intervalo_min' => 'required|integer|min:0',
            'intervalo_max' => 'required|integer|gte:intervalo_min', // 'gte' = "maior ou igual a"
            'acoes_recomendadas' => 'nullable|string',
        ]);

        Classificacao::create($request->all());

        return redirect()->route('classificacoes.index')->with('success', 'Classificação criada com sucesso!');
    }

    public function edit(Classificacao $classificacao)
    {
        return view('classificacoes.edit', compact('classificacao'));
    }

    public function update(Request $request, Classificacao $classificacao)
    {
        $request->validate([
            'tipo_class' => 'required|string|max:100|unique:classificacoes,tipo_class,' . $classificacao->id,
            'intervalo_min' => 'required|integer|min:0',
            'intervalo_max' => 'required|integer|gte:intervalo_min',
            'acoes_recomendadas' => 'nullable|string',
        ]);

        $classificacao->update($request->all());

        return redirect()->route('classificacoes.index')->with('success', 'Classificação atualizada com sucesso!');
    }

    public function destroy(Classificacao $classificacao)
    {
        $classificacao->delete();
        return redirect()->route('classificacoes.index')->with('success', 'Classificação excluída com sucesso!');
    }
}