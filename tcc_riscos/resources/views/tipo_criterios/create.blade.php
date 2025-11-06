<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Opção de Critério') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('tipo_criterios.store') }}" method="POST">
                        @csrf

                        <div class="mt-4">
                            <x-input-label for="criterios_id" :value="__('Critério (Pergunta) Pai')" />
                            <select name="criterios_id" id="criterios_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Selecione um critério (pergunta)</option>
                                @foreach($criterios as $criterio)
                                    <option value="{{ $criterio->id }}" {{ old('criterios_id') == $criterio->id ? 'selected' : '' }}>
                                        {{ $criterio->descricao }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('criterios_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="descricao" :value="__('Descrição (Opção de Resposta)')" />
                            <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required />
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="valor" :value="__('Valor (Pontuação)')" />
                            <x-text-input id="valor" class="block mt-1 w-full" type="number" name="valor" :value="old('valor')" required />
                            <x-input-error :messages="$errors->get('valor')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>