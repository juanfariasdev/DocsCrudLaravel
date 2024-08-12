<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold">Cadastrar</h1>
</div>
<form method="POST" action="/register" class="w-full mt-8">
    @csrf

    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
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
                
                <!-- Campo de CEP -->
                <x-partials.input-field 
                    type="text" 
                    name="cep" 
                    label="CEP" 
                    value="{{ old('cep') }}" 
                    placeholder="Digite o CEP" 
                    required 
                />

                <!-- Campo de Rua -->
                <x-partials.input-field 
                    type="text" 
                    name="rua" 
                    label="Rua" 
                    value="{{ old('rua') }}" 
                    placeholder="Digite o nome da rua" 
                    required 
                />

                <!-- Campo de Número -->
                <x-partials.input-field 
                    type="text" 
                    name="numero" 
                    label="Número" 
                    value="{{ old('numero') }}" 
                    placeholder="Digite o número" 
                    required 
                />

                <!-- Campo de Bairro -->
                <x-partials.input-field 
                    type="text" 
                    name="bairro" 
                    label="Bairro" 
                    value="{{ old('bairro') }}" 
                    placeholder="Digite o bairro" 
                    required 
                />

                <!-- Campo de Cidade -->
                <x-partials.input-field 
                    type="text" 
                    name="cidade" 
                    label="Cidade" 
                    value="{{ old('cidade') }}" 
                    placeholder="Digite a cidade" 
                    required 
                />

                <!-- Campo de Estado -->
                <x-partials.input-field 
                    type="text" 
                    name="estado" 
                    label="Estado" 
                    value="{{ old('estado') }}" 
                    placeholder="Digite o estado" 
                    required 
                />
            </div>
    <!-- Botão de Cadastro -->
    <x-partials.button text="Cadastrar" />

    <!-- Link para Login -->
    <div class="mt-6 text-center">
        <a href="/login" class="text-sm text-gray-600 hover:underline">
            Já tem uma conta? Entre aqui
        </a>
    </div>
</form>
