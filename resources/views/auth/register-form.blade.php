<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold">Cadastrar</h1>
</div>
    <x-user-register-form action="/register">
        <x-partials.button text="Cadastrar" />

    <!-- Link para Login -->
    <div class="mt-6 text-center">
        <a href="/login" class="text-sm text-gray-600 hover:underline">
            Já tem uma conta? Entre aqui
        </a>
    </div>
</x-user-form>
