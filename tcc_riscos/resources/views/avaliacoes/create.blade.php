<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aplicar Escala de Risco') }}: {{ $evento->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('avaliacoes.store', $evento) }}" method="POST">
                        @csrf
                        
                        @foreach($tiposDeRisco as $tipoRisco)
                            <div class="mt-6 mb-4">
                                <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-300 pb-2">
                                    {{ $tipoRisco->risco }}
                                </h3>

                                @foreach($tipoRisco->criterios as $criterio)
                                    <div class="mt-4 pl-4">
                                        <x-input-label>
                                            {{ $criterio->descricao }}
                                            </x-input-label>

                                        <div class="mt-2 space-y-2">
                                            @foreach($criterio->tipoCriterios as $opcao)
                                                <label class="flex items-center">
                                                    <input type="radio"
                                                           name="respostas[{{ $criterio->id }}]" 
                                                           value="{{ $opcao->id }}"
                                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                                    
                                                    <span class="ml-2 text-sm text-gray-600">
                                                        {{ $opcao->descricao }} (Valor: {{ $opcao->valor }})
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>
                                        <x-input-error :messages="$errors->get('respostas.' . $criterio->id)" class="mt-2" />
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="ml-4">
                                {{ __('Salvar e Calcular Risco') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>