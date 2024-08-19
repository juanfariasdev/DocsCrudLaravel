@section('title', 'Editar usuário')
<x-layouts.dashboard>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Editar Usuário</h1>
        @if (session('status'))
            <div class="bg-primary text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        <x-user-register-form action="{{ route('usuarios.update', ['id' => $user->id]) }}" method="PUT" :user="$user">
            <x-partials.button text="Salvar Alterações" />
        </x-user-form>
    </div>
</x-layouts.dashboard>
