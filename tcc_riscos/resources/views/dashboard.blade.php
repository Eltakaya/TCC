<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
    
    <h3 class="text-lg font-semibold border-b border-gray-300 pb-3">
        Registro de Avaliações de Risco (Todos os Eventos)
    </h3>

    @forelse ($avaliacoes as $avaliacao)
        <div class="mt-4 p-4 border border-gray-200 rounded-lg bg-white hover:shadow-md transition-shadow duration-200">
            
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="text-md font-bold text-gray-800 flex items-center gap-2">
                        {{ $avaliacao->evento->nome }}
                        
                        @if(\Carbon\Carbon::parse($avaliacao->evento->data_inicio)->isFuture())
                            <span class="px-2 py-0.5 text-xs rounded-full bg-blue-100 text-blue-800 font-semibold">
                                Agendado
                            </span>
                        @else
                            <span class="px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-600 font-semibold">
                                Realizado
                            </span>
                        @endif
                    </h4>
                    <p class="text-sm text-gray-600">
                        Data: {{ \Carbon\Carbon::parse($avaliacao->evento->data_inicio)->format('d/m/Y H:i') }}
                    </p>
                    <p class="text-sm text-gray-600">
                        Local: {{ $avaliacao->evento->local }}
                    </p>
                </div>

                <div class="text-right text-xs text-gray-500">
                    Avaliado em: {{ \Carbon\Carbon::parse($avaliacao->data_avaliacao)->format('d/m/Y') }}
                </div>
            </div>

            <hr class="my-3">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h5 class="font-semibold text-gray-700">Classificação de Risco</h5>
                    <p class="text-sm mt-1">
                        <span class="font-bold text-indigo-700">
                            {{ $avaliacao->classificacao->tipo_class ?? 'Não classificado' }}
                        </span>
                        <span class="text-gray-500">(Pontuação: {{ $avaliacao->pontuacao_total ?? 'N/A' }})</span>
                    </p>
                </div>

                <div>
                    <h5 class="font-semibold text-gray-700">Plano de Mitigação</h5>
                    
                    @if($avaliacao->planoMitigacao)
                        <p class="text-sm mt-1 text-green-700 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Plano Definido
                        </p>
                        <p class="text-xs text-gray-600 mt-1 truncate">
                            {{ Str::limit($avaliacao->planoMitigacao->descricao, 100) }}
                        </p>
                    @elseif($avaliacao->classificacao && $avaliacao->classificacao->tipo_class != 'Risco Baixo')
                        <a href="{{ route('planos.create', $avaliacao) }}" 
                            class="inline-flex items-center mt-1 px-3 py-1 bg-red-100 border border-red-200 rounded-md font-semibold text-xs text-red-700 hover:bg-red-200">
                            ⚠️ Pendente: Criar Plano
                        </a>
                    @else
                        <p class="text-sm text-gray-500 mt-1">Nenhum plano necessário.</p>
                    @endif
                </div>
            </div>
        </div>
    
    @empty
        <div class="mt-4 p-8 text-center text-gray-500 border-2 border-dashed border-gray-300 rounded-lg">
            Nenhuma avaliação registrada ainda.
            <br>
            <a href="{{ route('eventos.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">
                Ir para Meus Eventos e avaliar agora
            </a>
        </div>
    @endforelse

</div>
            </div>
        </div>
    </div>
</x-app-layout>