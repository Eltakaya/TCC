<x-guest-layout>
    <style>
        .error-message {
            color: #ef4444; /* Vermelho */
            font-size: 0.875rem; /* 14px */
            margin-top: 0.5rem; /* 8px */
        }
    </style>

    <div class="login-box">
        <div class="login-snip">

            <input id="tab-1" type="radio" name="tab" class="sign-in">
            <label for="tab-1" class="tab"><a href="{{ route('login') }}">Login</a></label>
            
            <input id="tab-2" type="radio" name="tab" class="sign-up" checked>
            <label for="tab-2" class="tab">Sign Up</label>
            
            <div class="login-space">
                
                <div class="login">
                    <div class="group">
                        <label class="label">Já possui uma conta?</label>
                    </div>
                    <div class="group">
                        <a href="{{ route('login') }}" class="button" style="text-align: center; line-height: 50px;">
                            Ir para a página de Login
                        </a>
                    </div>
                    <div class="hr"></div>
                    <div class="foot">
                        <label for="tab-2">Criar conta?</label>
                    </div>
                </div>

                <div class="sign-up-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="group">
                            <label for="name" class="label">Nome</label>
                            <input id="name" type="text" class="input" name="name" :value="old('name')" required autofocus placeholder="Crie seu Nome de Usuário">
                            <x-input-error :messages="$errors->get('name')" class="error-message" />
                        </div>
                        
                        <div class="group">
                            <label for="email" class="label">Email</label>
                            <input id="email" type="email" class="input" name="email" :value="old('email')" required placeholder="Entre com seu email">
                            <x-input-error :messages="$errors->get('email')" class="error-message" />
                        </div>

                        <div class="group">
                            <label for="password" class="label">Senha</label>
                            <input id="password" type="password" class="input" name="password" data-type="password" required placeholder="Crie sua senha">
                            <x-input-error :messages="$errors->get('password')" class="error-message" />
                        </div>
                        
                        <div class="group">
                            <label for="password_confirmation" class="label">Repetir Senha</label>
                            <input id="password_confirmation" type="password" class="input" name="password_confirmation" data-type="password" required placeholder="Repita sua senha">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                        </div>

                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        
                        <div class="hr"></div>
                        <div class="foot">
                            <label for="tab-1">Já é membro?</label>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>