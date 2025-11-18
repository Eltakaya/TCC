<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aplicar Escala de Risco') }}: {{ $evento->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8"> <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="mb-8">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-indigo-700">Progresso da Avaliação</span>
                            <span class="text-sm font-medium text-indigo-700" id="progress-text">0%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-300" id="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>

                    <form action="{{ route('avaliacoes.store', $evento) }}" method="POST" id="avaliacao-form">
                        @csrf
                        
                        @foreach($tiposDeRisco as $index => $tipoRisco)
                            <div class="form-step {{ $index > 0 ? 'hidden' : '' }}" data-step="{{ $index }}">
                                
                                <div class="border-b border-gray-200 pb-4 mb-6">
                                    <h3 class="text-2xl font-bold text-gray-800">
                                        {{ $tipoRisco->risco }}
                                    </h3>
                                    <p class="text-sm text-gray-500 mt-1">
                                        Passo {{ $index + 1 }} de {{ count($tiposDeRisco) }}
                                    </p>
                                </div>

                                @foreach($tipoRisco->criterios as $criterio)
                                    <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-100 hover:border-indigo-100 transition-colors">
                                        <x-input-label class="text-lg mb-3 text-gray-800">
                                            {{ $criterio->descricao }}
                                        </x-input-label>

                                        <div class="space-y-3 mt-2">
                                            @foreach($criterio->tipoCriterios as $opcao)
                                                <label class="flex items-center p-2 rounded hover:bg-white cursor-pointer transition-colors">
                                                    <input type="radio"
                                                           name="respostas[{{ $criterio->id }}]" 
                                                           value="{{ $opcao->id }}"
                                                           class="w-5 h-5 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                                           required> <span class="ml-3 text-gray-700">
                                                        {{ $opcao->descricao }}
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>
                                        <x-input-error :messages="$errors->get('respostas.' . $criterio->id)" class="mt-2" />
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="flex justify-between items-center mt-8 pt-4 border-t border-gray-200">
                            <button type="button" id="btn-prev" class="hidden px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 font-medium transition-colors">
                                ← Anterior
                            </button>
                            
                            <button type="button" id="btn-next" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-medium transition-colors">
                                Próximo →
                            </button>

                            <button type="submit" id="btn-submit" class="hidden px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 font-bold transition-colors shadow-md">
                                Concluir e Calcular
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentStep = 0;
            // Pega todos os divs que tem a classe .form-step
            const steps = document.querySelectorAll('.form-step');
            const totalSteps = steps.length;
            
            const btnPrev = document.getElementById('btn-prev');
            const btnNext = document.getElementById('btn-next');
            const btnSubmit = document.getElementById('btn-submit');
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');

            function updateUI() {
                // 1. Esconde todos os passos e mostra só o atual
                steps.forEach((step, index) => {
                    if (index === currentStep) {
                        step.classList.remove('hidden');
                    } else {
                        step.classList.add('hidden');
                    }
                });

                // 2. Atualiza a Barra de Progresso
                const progress = ((currentStep + 1) / totalSteps) * 100;
                progressBar.style.width = `${progress}%`;
                progressText.innerText = `${Math.round(progress)}%`;

                // 3. Controla a visibilidade dos botões
                // Botão Voltar: Esconde se for o primeiro passo
                if (currentStep === 0) {
                    btnPrev.classList.add('hidden');
                } else {
                    btnPrev.classList.remove('hidden');
                }

                // Botão Próximo vs Salvar:
                if (currentStep === totalSteps - 1) {
                    // Se for o último passo: Esconde 'Próximo', Mostra 'Salvar'
                    btnNext.classList.add('hidden');
                    btnSubmit.classList.remove('hidden');
                } else {
                    // Se não for o último: Mostra 'Próximo', Esconde 'Salvar'
                    btnNext.classList.remove('hidden');
                    btnSubmit.classList.add('hidden');
                }
                
                // Rola a tela para o topo do formulário (boa UX)
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Evento: Clicou em Próximo
            btnNext.addEventListener('click', () => {
                // (Opcional) Aqui você poderia validar se os radios do passo atual estão marcados
                // Para simplificar, vamos deixar avançar, mas o HTML 'required' vai bloquear o submit final
                if (currentStep < totalSteps - 1) {
                    currentStep++;
                    updateUI();
                }
            });

            // Evento: Clicou em Anterior
            btnPrev.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    updateUI();
                }
            });

            // Inicializa a tela
            updateUI();
        });
    </script>
</x-app-layout>