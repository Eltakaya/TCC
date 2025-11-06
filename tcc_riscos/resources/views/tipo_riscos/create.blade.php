<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Tipo de Risco') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('tipo_riscos.store') }}" method="POST">
                        @csrf

                        <div>
                            <x-input-label for="risco" :value="__('Descrição do Risco')" />
                            <x-text-input id="risco" class="block mt-1 w-full" type="text" name="risco" :value="old('risco')" required autofocus />
                            <x-input-error :messages="$errors->get('risco')" class="mt-2" />
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