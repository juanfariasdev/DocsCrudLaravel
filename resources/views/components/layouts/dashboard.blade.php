@extends('components.layouts.app')

@section('content')
    <div class="flex w-full">
        
        @php
            $menuItems = [
                [
                    'name' => 'Dashboard',
                    'route' => '#',
                    'icon' => 'fas fa-tachometer-alt',
                ],
                [
                    'name' => 'Main',
                    'route' => '#',
                    'icon' => 'fas fa-chart-line',
                    'subMenu' => [
                        ['name' => 'Analytics', 'route' => '#', 'icon' => 'fas fa-chart-pie'],
                        ['name' => 'Fintech', 'route' => '#', 'icon' => 'fas fa-chart-bar'],
                    ]
                ],
                [
                    'name' => 'Tarefas',
                    'route' => '#',
                    'icon' => 'fas fa-tasks',
                ],
                [
                    'name' => 'Relatórios',
                    'route' => '#',
                    'icon' => 'fas fa-file-alt',
                ],
                [
                    'name' => 'Usuários',
                    'route' => '#',
                    'icon' => 'fas fa-users',
                ],
            ];
        @endphp

        <x-partials.menu :menuItems="$menuItems" />

        <!-- Área Principal -->
        <div class="flex-1 flex flex-col">
            <!-- Cabeçalho -->
            <header class="bg-white shadow-lg p-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-700">{{ $title ?? 'Dashboard' }}</h1>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <button class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                            <img class="h-full w-full object-cover" src="https://via.placeholder.com/150" alt="Avatar">
                        </button>
                    </div>
                </div>
            </header>

            <!-- Conteúdo Principal -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
@endsection
