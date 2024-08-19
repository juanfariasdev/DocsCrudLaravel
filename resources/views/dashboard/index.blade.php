@section('title', $title ?? 'Início')
<x-layouts.dashboard>
    <div class="flex flex-col gap-2">
        <!-- Seção de Bem-vindo e Ações Rápidas -->
        <div class="w-full mb-6 lg:mb-0">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold">Bem-vindo, {{ auth()->user()->name }}!</h2>
            </div>
        </div>

        <!-- Seção de Estatísticas -->
        <x-relatory-form :users="$users"/>
    </div>
</x-layouts.dashboard>
