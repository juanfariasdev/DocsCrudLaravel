<x-layouts.dashboard>
    <div class="max-w-3xl mx-auto mt-8 bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Editar Usuário</h1>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('dashboard.usuarios.update', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')

            <!-- Campo de Nome -->
            <x-partials.input-field  
                type="text" 
                name="name" 
                label="Nome" 
                value="{{ old('name', $user->name) }}" 
                placeholder="Digite o nome do usuário" 
                required
            />

            <!-- Campo de Email -->
            <x-partials.input-field  
                type="email" 
                name="email" 
                label="Email" 
                value="{{ old('email', $user->email) }}" 
                placeholder="Digite o email do usuário" 
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

            <!-- Campo de Tipo de Usuário -->
            <x-partials.select-field 
                name="type" 
                label="Tipo de Usuário" 
                :options="['Admin', 'Empresa', 'Funcionario', 'Convidado']" 
                value="{{ old('type', $user->type) }}"
                required
            />

            <!-- Botão de Salvar -->
            <div>
                <x-partials.button text="Salvar Alterações" />
            </div>
        </form>
    </div>
</x-layouts.dashboard>
