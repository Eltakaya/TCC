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
        Registro de Avaliações de Risco 
    </h3>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="p-6 text-gray-900">
        
        
        @forelse ($avaliacoes as $avaliacao)
            <div class="mt-6 p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
                
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h4 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                            {{ $avaliacao->evento->nome }}
                            @if(\Carbon\Carbon::parse($avaliacao->evento->data_inicio)->isFuture())
                                <span class="px-2 py-0.5 text-xs rounded-full bg-blue-100 text-blue-800">Agendado</span>
                            @else
                                <span class="px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-600">Realizado</span>
                            @endif
                        </h4>
                        <p class="text-sm text-gray-600">Local: {{ $avaliacao->evento->local }}</p>
                    </div>
                    <div class="text-right text-xs text-gray-500">
                        Avaliado em: {{ \Carbon\Carbon::parse($avaliacao->data_avaliacao)->format('d/m/Y') }}
                    </div>
                </div>

                <hr class="mb-4">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <div class="flex flex-col justify-center">
                        <h5 class="font-semibold text-gray-700 mb-1">Classificação Geral</h5>
                        <div class="text-3xl font-bold text-indigo-700">
                            {{ $avaliacao->pontuacao_total ?? 0 }} <span class="text-sm text-gray-500 font-normal">pontos</span>
                        </div>
                        <p class="text-lg font-medium text-gray-800">
                            {{ $avaliacao->classificacao->tipo_class ?? 'Não classificado' }}
                        </p>
                    </div>

                    <div>
                        <h5 class="font-semibold text-gray-700 mb-2">Plano de Mitigação</h5>
                        @if($avaliacao->planoMitigacao)
                            <div class="bg-green-50 p-3 rounded border border-green-200 h-32 overflow-y-auto text-sm">
                                <p class="text-green-800 font-medium mb-1">✓ Plano Definido</p>
                                <p class="text-gray-600">{{ $avaliacao->planoMitigacao->descricao }}</p>
                            </div>
                            @elseif($avaliacao->classificacao && $avaliacao->classificacao->tipo_class != 'Risco Baixo')
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 mb-3">Pendente.</p>
                                    
                                    <a href="{{ route('planos.create', $avaliacao) }}" 
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none transition ease-in-out duration-150">
                                        Criar Plano
                                    </a>
                                </div>
                        @else
                            <div class="h-32 flex items-center justify-center bg-gray-50 rounded border border-gray-200 text-gray-500 text-sm">
                                Não necessário
                            </div>
                        @endif
                    </div>

                    <div class="relative h-40 w-full">
                        <h5 class="font-semibold text-gray-700 mb-2 text-center text-sm">Distribuição do Risco (%)</h5>
                        <canvas id="chart-{{ $avaliacao->id }}"></canvas>
                    </div>

                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const ctx{{ $avaliacao->id }} = document.getElementById('chart-{{ $avaliacao->id }}');
                    
                    new Chart(ctx{{ $avaliacao->id }}, {
                        type: 'bar',
                        data: {
                            // Labels vindas do Controller (ex: Humanos, Naturais)
                            labels: @json($avaliacao->chartLabels),
                            datasets: [{
                                label: '% de Impacto',
                                // Dados vindos do Controller
                                data: @json($avaliacao->chartData),
                                backgroundColor: [
                                    'rgba(156, 122, 242, 0.7)', // Lilás
                                    'rgba(249, 230, 92, 0.7)',  // Amarelo
                                    'rgba(43, 30, 75, 0.7)',    // Roxo Escuro
                                    'rgba(75, 192, 192, 0.7)',
                                    'rgba(255, 99, 132, 0.7)'
                                ],
                                borderColor: [
                                    'rgba(156, 122, 242, 1)',
                                    'rgba(249, 230, 92, 1)',
                                    'rgba(43, 30, 75, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 99, 132, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            layout: {
                                padding: 20
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: false } // Esconde a legenda para economizar espaço
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100, // Escala até 100%
                                    ticks: { font: { size: 10 } }
                                },
                                x: {
                                    ticks: { font: { size: 10 } }
                                }
                            }
                        }
                    });
                });
            </script>

        @empty
            <div class="mt-10 text-center text-gray-500">
                Nenhuma avaliação registrada.
            </div>
        @endforelse
    </div>

</div>
            </div>
        </div>
    </div>
</x-app-layout>