<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Classificação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('classificacoes.update', $classificacao->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-input-label for="tipo_class" :value="__('Nome da Classificação (ex: Risco Baixo)')" />
                            <x-text-input id="tipo_class" class="block mt-1 w-full" type="text" name="tipo_class" :value="old('tipo_class', $classificacao->tipo_class)" required autofocus />
                            <x-input-error :messages="$errors->get('tipo_class')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="intervalo_min" :value="__('Pontuação Mínima')" />
                            <x-text-input id="intervalo_min" class="block mt-1 w-full" type="number" name="intervalo_min" :value="old('intervalo_min', $classificacao->intervalo_min)" required />
                            <x-input-error :messages="$errors->get('intervalo_min')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="intervalo_max" :value="__('Pontuação Máxima')" />
                            <x-text-input id="intervalo_max" class="block mt-1 w-full" type="number" name="intervalo_max" :value="old('intervalo_max', $classificacao->intervalo_max)" required />
                            <x-input-error :messages="$errors->get('intervalo_max')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="acoes_recomendadas" :value="__('Ações Recomendadas (Opcional)')" />
                            <textarea name="acoes_recomendadas" id="acoes_recomendadas" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('acoes_recomendadas', $classificacao->acoes_recomendadas) }}</textarea>
                            <x-input-error :messages="$errors->get('acoes_recomendadas')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Atualizar') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>