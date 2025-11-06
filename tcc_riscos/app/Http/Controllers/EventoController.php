<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Precisamos disso para saber quem está logado

class EventoController extends Controller
{
    /**
     * Mostra a lista de eventos (R - Read).
     */
    public function index()
    {
        // Pega apenas os eventos que pertencem ao usuário logado
        $eventos = Auth::user()->eventos()->latest()->get();

        // Retorna a view (que vamos criar) e passa os eventos para ela
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Mostra o formulário para criar um novo evento (C - Create).
     */
    public function create()
    {
        // Apenas mostra o formulário
        return view('eventos.create');
    }

    /**
     * Salva o novo evento no banco de dados.
     */
    public function store(Request $request)
    {
        // 1. Validar os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:500',
            'local' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        // 2. Salvar os dados (associando ao usuário logado)
        Auth::user()->eventos()->create([
            'nome' => $request->nome,
            'local' => $request->local,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
        ]);

        // 3. Redirecionar de volta para a lista com uma msg de sucesso
        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso!');
    }

    /**
     * Mostra o formulário para editar um evento (U - Update).
     */
    public function edit(Evento $evento) // O Laravel encontra o Evento pelo ID da URL automaticamente
    {
        // Apenas mostra o formulário de edição, passando o evento
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Atualiza o evento no banco de dados.
     */
    public function update(Request $request, Evento $evento)
    {
        // 1. Validar os dados
        $request->validate([
            'nome' => 'required|string|max:500',
            'local' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        // 2. Atualizar o evento
        $evento->update([
            'nome' => $request->nome,
            'local' => $request->local,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
        ]);

        // 3. Redirecionar
        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * Remove o evento do banco de dados (D - Delete).
     */
    public function destroy(Evento $evento)
    {
        // 1. Deletar o evento
        $evento->delete();

        // 2. Redirecionar
        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso!');
    }
}