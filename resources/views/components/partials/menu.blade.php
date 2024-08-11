@props([
    'menuItems' => [],
    'class' => 'bg-white text-gray-700 hover:text-green-800 hover:font-bold',
    'activeClass' => 'bg-green-200 text-green-900',
])

@php
    // Classe padrão para links de navegação
    $baseClass = 'flex items-center py-2 px-4 nav-item transition-all duration-300 ease-in-out';

    // Função para gerar a classe final de cada item
    function generateItemClass($item, $baseClass, $class, $activeClass) {
        return request()->is($item['route']) ? "$baseClass $activeClass" : "$baseClass $class";
    }
@endphp

<div {{ $attributes->merge(['class' => 'w-56 bg-white h-screen shadow-lg']) }}>
    <div class="p-6 text-xl font-semibold">
        {{ config('app.name', 'Dashboard') }}
    </div>
    <nav class="text-base pt-3">
        @foreach ($menuItems as $menuItem)
            <div>
                <a href="{{ $menuItem['route'] ?? '#' }}" 
                   class="{{ generateItemClass($menuItem, $baseClass, $class, $activeClass) }}">
                    <i class="{{ $menuItem['icon'] }} mr-3"></i>
                    <span>{{ $menuItem['name'] }}</span>
                    @if(isset($menuItem['subMenu']))
                        <i class="fas fa-chevron-down ml-auto"></i> {{-- Ícone de seta apontando para baixo --}}
                    @endif
                </a>
                @if (isset($menuItem['subMenu']))
                    <div class="pl-6">
                        @foreach ($menuItem['subMenu'] as $subItem)
                            <a href="{{ $subItem['route'] }}" 
                               class="{{ generateItemClass($subItem, $baseClass, $class, $activeClass) }}">
                                <i class="{{ $subItem['icon'] }} mr-3"></i>
                                <span>{{ $subItem['name'] }}</span>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </nav>
</div>
