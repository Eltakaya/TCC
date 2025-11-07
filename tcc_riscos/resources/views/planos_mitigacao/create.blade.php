<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Plano de Mitigação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-semibold">{{ $avaliacao->evento->nome }}</h3>
                    <p class="text-sm text-gray-600">
                        Classificação: <span class="font-bold">{{ $avaliacao->classificacao->tipo_class ?? 'N/A' }}</span>
                        (Pontuação: {{ $avaliacao->pontuacao_total }})
                    </p>
                    
                    @if($recomendacoes)
                    <div class="mt-4 p-4 bg-yellow-50 border border-yellow-300 rounded-lg">
                        <h4 class="font-semibold text-yellow-800">Ações Recomendadas (Sugestão):</h4>
                        <p class="text-sm text-yellow-700">{{ $recomendacoes }}</p>
                    </div>
                    @endif

                    <form action="{{ route('planos.store', $avaliacao) }}" method="POST" class="mt-6">
                        @csrf
                        
                        <div>
                            <x-input-label for="descricao" :value="__('Descreva o Plano de Mitigação para este Risco')" />
                            <textarea id="descricao" name="descricao" rows="10" 
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            >{{ old('descricao', $recomendacoes) }}</textarea> <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Salvar Plano') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
