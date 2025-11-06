<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Novo Evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('eventos.store') }}" method="POST">
                        @csrf <div>
                            <x-input-label for="nome" :value="__('Nome do Evento')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="local" :value="__('Local')" />
                            <x-text-input id="local" class="block mt-1 w-full" type="text" name="local" :value="old('local')" required />
                            <x-input-error :messages="$errors->get('local')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="data_inicio" :value="__('Data e Hora de Início')" />
                            <x-text-input id="data_inicio" class="block mt-1 w-full" type="datetime-local" name="data_inicio" :value="old('data_inicio')" required />
                            <x-input-error :messages="$errors->get('data_inicio')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="data_fim" :value="__('Data e Hora de Término')" />
                            <x-text-input id="data_fim" class="block mt-1 w-full" type="datetime-local" name="data_fim" :value="old('data_fim')" required />
                            <x-input-error :messages="$errors->get('data_fim')" class="mt-2" />
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