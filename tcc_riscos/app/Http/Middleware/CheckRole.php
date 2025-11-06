<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Precisamos disso

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  (Vamos definir este 'role' na nossa rota)
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Verifica se o usuário está logado E se o 'role' dele é o que esperamos
        if (!Auth::check() || Auth::user()->role != $role) {
            // Se não for, redireciona para o dashboard com um erro.
            return redirect('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }

        return $next($request);
    }
}