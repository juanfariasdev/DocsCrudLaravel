@extends('components.layouts.app')

@section('content')
    <!-- Menu Lateral Esquerdo -->
    <div class="flex w-full">
        <div class="w-56 bg-white h-screen shadow-lg">
            <div class="p-6 text-xl font-semibold">
                {{ config('app.name', 'Dashboard') }}
            </div>
            <nav class="text-gray-700 text-base pt-3">
                <a href="#" class="flex items-center py-2 pl-4 nav-item hover:bg-green-100 hover:text-green-800">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <div>
                    <a href="#" class="flex items-center py-2 pl-4 nav-item hover:bg-green-100 hover:text-green-800">
                        <i class="fas fa-chart-line mr-3"></i>
                        Main
                    </a>
                    <a href="#" class="flex items-center py-2 pl-4 nav-item hover:bg-green-100 hover:text-green-800">
                        <i class="fas fa-chart-pie mr-3"></i>
                        Analytics
                    </a>
                    <a href="#" class="flex items-center py-2 pl-4 nav-item hover:bg-green-100 hover:text-green-800">
                        <i class="fas fa-chart-bar mr-3"></i>
                        Fintech
                    </a>
                </div>
                <a href="#" class="flex items-center py-2 pl-4 nav-item hover:bg-green-100 hover:text-green-800">
                    <i class="fas fa-tasks mr-3"></i>
                    Tarefas
                </a>
                <a href="#" class="flex items-center py-2 pl-4 nav-item hover:bg-green-100 hover:text-green-800">
                    <i class="fas fa-file-alt mr-3"></i>
                    Relatórios
                </a>
                <a href="#" class="flex items-center py-2 pl-4 nav-item hover:bg-green-100 hover:text-green-800">
                    <i class="fas fa-users mr-3"></i>
                    Usuários
                </a>
            </nav>
        </div>

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
