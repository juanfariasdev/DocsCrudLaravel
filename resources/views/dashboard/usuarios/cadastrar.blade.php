<x-layouts.dashboard>
    <div class="max-w-3xl mx-auto mt-8 bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Cadastrar Usuário</h1>
        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif
        <x-user-register-form action="{{ route('usuarios.store') }}">
            <x-partials.button text="Cadastrar Usuário" />
        </x-user-form>
    </div>
</x-layouts.dashboard>
