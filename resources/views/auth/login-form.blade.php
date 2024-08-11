<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold">Entrar</h1>
</div>

<form method="POST" action="/login" class="mx-auto max-w-xs mt-8">
    @csrf

    <!-- Campo de E-mail -->
    <x-input-field 
        type="text" 
        name="email" 
        label="E-mail" 
        placeholder="Digite seu e-mail" 
        required
    />

    <!-- Campo de Senha com Mostrar/Ocultar Senha -->
    <x-input-field 
        type="password" 
        name="password" 
        label="Senha" 
        placeholder="Digite sua senha" 
        required
    />

    <!-- Botão de Enviar -->
    <x-button text="Entrar" />

    <!-- Link para Cadastro -->
    <div class="mt-6 text-center">
        <a href="/register" class="text-sm text-gray-600 hover:underline">
            Não tem uma conta? Cadastre-se aqui
        </a>
    </div>
</form>