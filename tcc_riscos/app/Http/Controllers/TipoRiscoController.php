<?php

namespace App\Http\Controllers;

use App\Models\TipoRisco;
use Illuminate\Http\Request;

class TipoRiscoController extends Controller
{
    /**
     * Mostra a lista.
     */
    public function index()
    {
        $tipoRiscos = TipoRisco::latest()->get();
        return view('tipo_riscos.index', compact('tipoRiscos'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        return view('tipo_riscos.create');
    }

    /**
     * Salva no banco.
     */
    public function store(Request $request)
    {
        $request->validate([
            'risco' => 'required|string|max:150|unique:tipo_riscos',
        ]);

        TipoRisco::create($request->all());

        return redirect()->route('tipo_riscos.index')->with('success', 'Tipo de Risco criado com sucesso!');
    }


    /**
     * Mostra o formulário de edição.
     */
    public function edit(TipoRisco $tipoRisco)
    {
        return view('tipo_riscos.edit', compact('tipoRisco'));
    }

    /**
     * Atualiza no banco.
     */
    public function update(Request $request, TipoRisco $tipoRisco)
    {
        $request->validate([
            'risco' => 'required|string|max:150|unique:tipo_riscos,risco,' . $tipoRisco->id,
        ]);

        $tipoRisco->update($request->all());

        return redirect()->route('tipo_riscos.index')->with('success', 'Tipo de Risco atualizado com sucesso!');
    }

    /**
     * Deleta do banco.
     */
    public function destroy(TipoRisco $tipoRisco)
    {
        $tipoRisco->delete();
        return redirect()->route('tipo_riscos.index')->with('success', 'Tipo de Risco excluído com sucesso!');
    }
}