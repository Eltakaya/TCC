<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .welcome-card {
            background: rgba(43, 30, 75, .9);
            border-radius: 8px; 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
        /* --- ANIMAÇÃO DE FUNDO (NOVO) --- */
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animated-gradient {
            /* Define o degradê com suas cores */
            background: linear-gradient(-45deg, #2B1E4B, #9C7AF2, #2B1E4B);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
        }
        /* --- FIM DA ANIMAÇÃO --- */

        /* --- SUAS CORES (para texto, etc.) --- */
        .text-roxo-escuro { color: #2B1E4B; }
        .text-amarelo { color: #F9E65C; }
        .border-amarelo { border-color: #F9E65C; }
        .hover\:bg-amarelo:hover { background-color: #F9E65C; }
        .hover\:text-roxo-escuro:hover { color: #2B1E4B; }
        .leading-relaxed-custom { line-height: 1.6; }
    </style>
    </head>
    
    <body class="antialiased min-h-screen text-gray-200 flex items-center justify-center animated-gradient">        
        <div class="welcome-card text-left p-6 max-w-2xl mx-auto">
        
            <h1 class="text-5xl font-bold text-amarelo">
                Bem Vindo
            </h1>
            
            <p class="mt-4 text-2xl text-gray-100 mb-10">
                Sistema de Gestão e Análise de Risco em Eventos
            </p>
            
            <div class="leading-relaxed-custom text-lg text-gray-300 space-y-6">
                <p>
                    Esta proposta metodológica tem como finalidade facilitar a identificação de riscos em eventos e compreender a sua natureza.
                    Acredita-se que seja um procedimento importante para manter o evento dentro de parâmetros confiáveis de segurança.
                </p>
                <p>
                    Este documento foi elaborado, a partir dos resultados obtidos com o projeto de pesquisa ititulado MAPEAMENTO DE RISCOS EM EVENTOS: ESTUDO SOBRE
                    OS BUFFETS INFANTIS EM PRESIDENTE PRUDENTE-SP, financiado pelo Conselho Nacional de Desenvolvimento Científico e 
                    Tecnológico (CNPq). A proposta é uma adaptação do arquivo disponibilizado por meio da Portaria Secretaria Municipal de Saúde do município 
                    de São Paulo-SP, N° 677 de 20/02/2014, que reformula a Portaria N° 1014/2012 SMS/COMURGE, e trata das normas para elaboração de Planos de Atenção Médica em Eventos Temporários,
                    Públicos, Privados ou Mistos na cidade de São Paulo
                </p>
                
            </div>
            
            <p class="mt-6 text-sm text-gray-400">
            <p>
                    Responsáveis pelo Projeto
                    <ul>
                        <li>Eduardo Takaya</li>
                        <li>Fernanda Delben</li>
                        <li>Hiago Aros</li>
                        <li>Mariana Souza</li>
                        <li>Vanessa Borges</li>
                    </ul>
                </p>
            </p>
            
            <div class="mt-12">
                <a href="{{ route('login') }}" 
                    class="inline-block bg-transparent border-2 border-amarelo text-amarelo font-bold py-3 px-8 rounded-full text-lg uppercase transition duration-300 ease-in-out hover:bg-amarelo hover:text-roxo-escuro">
                    Entrar
                </a>
            </div>

        </div>
    </body>
</html>