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

            <!-- Campos de Endereço -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-partials.input-field 
                    type="text" 
                    name="rua" 
                    label="Rua" 
                    value="{{ old('rua', $user->address->rua ?? '') }}" 
                    placeholder="Digite o nome da rua" 
                    required 
                />

                <x-partials.input-field 
                    type="text" 
                    name="numero" 
                    label="Número" 
                    value="{{ old('numero', $user->address->numero ?? '') }}" 
                    placeholder="Digite o número" 
                    required 
                />

                <x-partials.input-field 
                    type="text" 
                    name="bairro" 
                    label="Bairro" 
                    value="{{ old('bairro', $user->address->bairro ?? '') }}" 
                    placeholder="Digite o bairro" 
                    required 
                />

                <x-partials.input-field 
                    type="text" 
                    name="cep" 
                    label="CEP" 
                    value="{{ old('cep', $user->address->cep ?? '') }}" 
                    placeholder="Digite o CEP" 
                    required 
                />

                <x-partials.input-field 
                    type="text" 
                    name="cidade" 
                    label="Cidade" 
                    value="{{ old('cidade', $user->address->cidade ?? '') }}" 
                    placeholder="Digite a cidade" 
                    required 
                />

                <x-partials.input-field 
                    type="text" 
                    name="estado" 
                    label="Estado" 
                    value="{{ old('estado', $user->address->estado ?? '') }}" 
                    placeholder="Digite o estado" 
                    required 
                />
            </div>

            <!-- Botão de Salvar -->
            <div class="mt-6">
                <x-partials.button text="Salvar Alterações" />
            </div>
        </form>
    </div>
</x-layouts.dashboard>
