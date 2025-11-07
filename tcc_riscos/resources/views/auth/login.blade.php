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
            
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab">Login</label>
            
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab"><a href="{{ route('register') }}">Sign Up</a></label>
            
            <div class="login-space">
                
                <div class="login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="group">
                            <label for="email" class="label">Email</label>
                            <input id="email" type="email" class="input" name="email" :value="old('email')" required autofocus placeholder="Entre com seu email">
                            <x-input-error :messages="$errors->get('email')" class="error-message" />
                        </div>
                        
                        <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" type="password" class="input" name="password" data-type="password" required placeholder="Entre com sua senha">
                            <x-input-error :messages="$errors->get('password')" class="error-message" />
                        </div>
                        
                        <div class="group">
                            <input id="remember_me" name="remember" type="checkbox" class="check">
                            <label for="remember_me"><span class="icon"></span> Manter conectado</label>
                        </div>
                        
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                        
                        <div class="hr"></div>
                        
                        <div class="foot">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Esqueceu a senha?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <div class="sign-up-form">
                    <div class="group">
                        <label class="label">Deseja se registrar?</label>
                    </div>
                    <div class="group">
                        <a href="{{ route('register') }}" class="button" style="text-align: center; line-height: 50px;">
                            Ir para a página de Registro
                        </a>
                    </div>
                    <div class="hr"></div>
                    <div class="foot">
                        <label for="tab-1">Já é membro?</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>