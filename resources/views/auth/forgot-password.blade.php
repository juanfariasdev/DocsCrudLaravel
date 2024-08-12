<x-layouts.auth>
<div class="max-w-md mx-auto mt-8 bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Esqueci a Senha</h1>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <x-partials.input-field 
                type="email" 
                name="email" 
                label="E-mail" 
                placeholder="Digite seu e-mail" 
                required
            />

            <x-partials.button text="Enviar Link de Redefinição" />
        </form>
        <div class="mt-6 text-center">
        <a href="/login" class="text-sm text-gray-600 hover:underline">
            Lembrou a senha? Entre aqui
        </a>
    </div>
    </div>
</x-layouts.auth>