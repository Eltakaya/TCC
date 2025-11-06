<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\TipoRisco; // <-- 1. Precisamos disso para o dropdown
use Illuminate\Http\Request;

class CriterioController extends Controller
{
    /**
     * Mostra a lista de critérios.
     */
    public function index()
    {
        // Usamos 'with' para já buscar o 'tipoRisco' relacionado
        // Isso evita o "problema N+1" e é mais performático.
        $criterios = Criterio::with('tipoRisco')->latest()->get();
        return view('criterios.index', compact('criterios'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        // 2. Busca todos os Tipo de Riscos para preencher o <select>
        $tipoRiscos = TipoRisco::all();
        return view('criterios.create', compact('tipoRiscos'));
    }

    /**
     * Salva no banco.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string',
            'peso' => 'nullable|numeric|min:0',
            'tipo_riscos_id' => 'required|exists:tipo_riscos,id', // Valida se o ID existe
        ]);

        Criterio::create($request->all());

        return redirect()->route('criterios.index')->with('success', 'Critério criado com sucesso!');
    }


    /**
     * Mostra o formulário de edição.
     */
    public function edit(Criterio $criterio)
    {
        // 3. Precisamos dos dois: o critério específico e a lista para o <select>
        $tipoRiscos = TipoRisco::all();
        return view('criterios.edit', compact('criterio', 'tipoRiscos'));
    }

    /**
     * Atualiza no banco.
     */
    public function update(Request $request, Criterio $criterio)
    {
        $request->validate([
            'descricao' => 'required|string',
            'peso' => 'nullable|numeric|min:0',
            'tipo_riscos_id' => 'required|exists:tipo_riscos,id',
        ]);

        $criterio->update($request->all());

        return redirect()->route('criterios.index')->with('success', 'Critério atualizado com sucesso!');
    }

    /**
     * Deleta do banco.
     */
    public function destroy(Criterio $criterio)
    {
        $criterio->delete();
        return redirect()->route('criterios.index')->with('success', 'Critério excluído com sucesso!');
    }
}