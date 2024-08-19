@extends('components.layouts.app')
@section('content')
    <div class="flex w-full max-h-screen overflow-hidden">
    <x-partials.menu :menuItems="$menuItems" />

        <!-- Área Principal -->
        <div class="flex-1 flex flex-col">
            <!-- Cabeçalho -->
            <header class="bg-white shadow-lg p-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-700">@yield('title', $title?? "Dashboard")</h1>
                </div>
                <div class="flex items-center relative">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="relative h-8 w-8 rounded-full bg-gray-500 text-white flex items-center justify-center overflow-hidden shadow focus:outline-none">
                            <span class="text-lg font-semibold">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg py-1 z-20">
                            <div class="px-4 py-2">
                                <span class="block text-sm text-gray-700">{{ auth()->user()->name }}</span>
                                <span class="block text-sm text-gray-500 truncate">{{ auth()->user()->email }}</span>
                                <span class="block text-sm text-gray-500 font-medium">{{ auth()->user()->type }}</span>
                            </div>
                            <div class="border-t border-gray-100"></div>
                            <a href="{{ route('perfil') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Conteúdo Principal -->
            <main class="p-4 overflow-y-scroll flex-1">
                {{ $slot }}
            </main>
        </div>
    </div>
@endsection
