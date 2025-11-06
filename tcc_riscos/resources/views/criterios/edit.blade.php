<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Critério') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('criterios.update', $criterio) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-input-label for="tipo_riscos_id" :value="__('Grupo (Tipo de Risco)')" />
                            <select name="tipo_riscos_id" id="tipo_riscos_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Selecione um tipo de risco</option>
                                @foreach($tipoRiscos as $tipo)
                                    <option value="{{ $tipo->id }}" {{ old('tipo_riscos_id', $criterio->tipo_riscos_id) == $tipo->id ? 'selected' : '' }}>
                                        {{ $tipo->risco }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('tipo_riscos_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="descricao" :value="__('Critério (Pergunta)')" />
                            <textarea name="descricao" id="descricao" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('descricao', $criterio->descricao) }}</textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="peso" :value="__('Peso (Opcional)')" />
                            <x-text-input id="peso" class="block mt-1 w-full" type="number" step="0.01" name="peso" :value="old('peso', $criterio->peso)" />
                            <x-input-error :messages="$errors->get('peso')" class="mt-2" />
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