<x-layouts.dashboard>
    <div class="max-w-3xl mx-auto mt-8 bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Cadastrar Usuário</h1>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('usuarios.store') }}">
            @csrf

            <!-- Campo de Nome -->
            <x-partials.input-field  
                type="text" 
                name="name" 
                label="Nome" 
                value="{{ old('name') }}" 
                placeholder="Digite o nome do usuário" 
                required
            />

            <!-- Campo de Email -->
            <x-partials.input-field  
                type="email" 
                name="email" 
                label="Email" 
                value="{{ old('email') }}" 
                placeholder="Digite o email do usuário" 
                required
            />

            <!-- Campo de Senha -->
            <x-partials.input-field 
                type="password" 
                name="password" 
                label="Senha" 
                placeholder="Digite a senha" 
                required
            />

            <!-- Campo de Confirmação de Senha -->
            <x-partials.input-field 
                type="password" 
                name="password_confirmation" 
                label="Confirmar Senha" 
                placeholder="Confirme a senha"
                required
            />

            <!-- Campo de Tipo de Usuário -->
            <x-partials.select-field 
                name="type" 
                label="Tipo de Usuário" 
                :options="['Admin', 'Empresa', 'Funcionario', 'Convidado']" 
                required
            />

            <!-- Botão de Cadastrar -->
            <div>
                <x-partials.button text="Cadastrar Usuário" />
            </div>
        </form>
    </div>
</x-layouts.dashboard>
