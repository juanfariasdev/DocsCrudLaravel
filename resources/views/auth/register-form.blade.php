<div class="flex flex-partials.col items-center">
    <h1 class="text-2xl font-bold">Cadastrar</h1>
</div>
<form method="POST" action="/register" class="mx-partials.auto max-partials.w-xs mt-8">
    @csrf

    <!-- Campo de Nome Completo -->
    <x-partials.input-field  
        type="text" 
        name="name" 
        label="Nome Completo" 
        placeholder="Digite seu nome completo" 
        required
    />

    <!-- Campo de E-mail -->
    <x-partials.input-field 
        type="text" 
        name="email" 
        label="E-mail" 
        placeholder="Digite seu e-mail" 
        required
    />

    <!-- Campo de Senha -->
    <x-partials.input-field 
        type="password" 
        name="password" 
        label="Senha" 
        placeholder="Digite sua senha" 
        required
    />

    <!-- Campo de Confirmação de Senha -->
    <x-partials.input-field 
        type="password" 
        name="password_confirmation" 
        label="Confirmar Senha" 
        placeholder="Confirme sua senha" 
        required
    />

    <!-- Botão de Cadastro -->
    <x-partials.button text="Cadastrar" />

    <!-- Link para Login -->
    <div class="mt-6 text-center">
        <a href="/login" class="text-sm text-gray-600 hover:underline">
            Já tem uma conta? Entre aqui
        </a>
    </div>
</form>