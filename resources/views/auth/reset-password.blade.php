<x-layouts.auth>
    <div class="max-w-md mx-auto mt-8 bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Redefinir Senha</h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <x-partials.input-field 
                type="email" 
                name="email" 
                value="{{ old('email', request()->email) }}" 
                label="E-mail" 
                placeholder="Digite seu e-mail" 
                required 
                readonly
            />

            <x-partials.input-field 
                type="password" 
                name="password" 
                label="Nova Senha" 
                placeholder="Digite sua nova senha" 
                required
            />

            <x-partials.input-field 
                type="password" 
                name="password_confirmation" 
                label="Confirme a Nova Senha" 
                placeholder="Confirme sua nova senha" 
                required
            />

            <x-partials.button text="Redefinir Senha" />
        </form>
    </div>
</x-layouts.auth>
