<x-layouts.dashboard>
    
    <div class="max-w-3xl mx-auto mt-8 bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Meu Perfil</h1>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('perfil.update') }}">
            @csrf

            <!-- Campo de Nome -->
            <x-partials.input-field  
                type="text" 
                name="name" 
                label="Nome" 
                value="{{ old('name', $user->name) }}" 
                placeholder="Digite seu nome" 
                required
            />

            <!-- Campo de Nova Senha -->
            <x-partials.input-field 
                type="password" 
                name="password" 
                label="Nova Senha" 
                placeholder="Deixe em branco para manter a senha atual"
            />

            <!-- Campo de Confirmação de Senha -->
            <x-partials.input-field 
                type="password" 
                name="password_confirmation" 
                label="Confirmar Nova Senha" 
                placeholder="Confirme sua nova senha"
            />

            <!-- Botão de Salvar -->
            <div>
                <x-partials.button text="Salvar Alterações" />
            </div>
        </form>
    </div>
</x-layouts.dashboard>
