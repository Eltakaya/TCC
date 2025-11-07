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
                        Histórico de Eventos Realizados e Avaliados
                    </h3>

                    @forelse ($avaliacoesPassadas as $avaliacao)
                        <div class="mt-4 p-4 border border-gray-200 rounded-lg">

                            <h4 class="text-md font-bold text-gray-800">
                                {{ $avaliacao->evento->nome }}
                            </h4>
                            <p class="text-sm text-gray-600">
                                Realizado em: {{ \Carbon\Carbon::parse($avaliacao->evento->data_fim)->format('d/m/Y') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                Local: {{ $avaliacao->evento->local }}
                            </p>

                            <hr class="my-3">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h5 class="font-semibold">Classificação de Risco</h5>
                                    <p class="text-sm">
                                        {{ $avaliacao->classificacao->tipo_class ?? 'Não classificado' }} 
                                        (Pontuação: {{ $avaliacao->pontuacao_total ?? 'N/A' }})
                                    </p>
                                </div>

                                <div>
                                    <h5 class="font-semibold">Plano de Mitigação</h5>

                                    @if($avaliacao->planoMitigacao)
                                        <p class="text-sm">{{ $avaliacao->planoMitigacao->descricao }}</p>

                                    @elseif($avaliacao->classificacao && $avaliacao->classificacao->tipo_class != 'Risco Baixo')
                                        <a href="{{ route('planos.create', $avaliacao) }}" 
                                        class="inline-flex items-center mt-1 px-3 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                            Criar Plano
                                        </a>

                                    @else
                                        <p class="text-sm text-gray-500">Nenhum plano necessário.</p>
                                    @endif

                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="mt-4 p-4 text-center text-gray-500">
                            Nenhum evento realizado e avaliado encontrado no seu histórico.
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>