<x-guest-layout>

    <div class="p-6">
        
        <h2 class="text-xl font-bold text-center mb-4 text-gray-900 dark:text-white">
            SISTEMA DE ESCALA DE GRADUAÇÃO DE RISCOS
        </h2>

        <p class="text-sm text-gray-700 dark:text-gray-400 mb-6">
            Esta proposta metodológica tem como finalidade facilitar a identificação de riscos em eventos e compreender a sua natureza. Acredita-se que seja um procedimento importante para manter o evento dentro de parâmetros confiáveis de segurança.
        </p>

        <hr class="my-4 border-gray-200 dark:border-gray-700">

        <div class="border-l-4 border-red-500 p-3 bg-red-50 dark:bg-gray-700">
            <p class="font-semibold text-red-700 dark:text-red-400 mb-1">
                Observação:
            </p>
            <p class="text-xs text-gray-800 dark:text-gray-300">
                Este documento foi elaborado, a partir dos resultados obtidos com o projeto de pesquisa intitulado **MAPEAMENTO DE RISCOS EM EVENTOS: ESTUDO SOBRE OS BUFFETS INFANTIS EM PRESIDENTE PRUDENTE-SP**, financiado pelo Conselho Nacional de Desenvolvimento Científico e Tecnológico (CNPq). A proposta é uma adaptação do arquivo disponibilizado por meio da Portaria Secretaria Municipal de Saúde do município de São Paulo-SP, N.º 677 de 20/02/2014, que reformula a Portaria N.º 1014/2012 SMS/COMURGE, e trata das normas para elaboração de Planos de Atenção Médica em Eventos Temporários, Públicos, Privados ou Mistos na cidade de São Paulo.
            </p>
        </div>
        
    </div>

    <div class="mt-4 text-center">
        @if (Route::has('login'))
            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                Acessar Login
            </a>
        @endif
        </p>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Registrar
            </a>
        @endif

    </div>

</x-guest-layout>
        
