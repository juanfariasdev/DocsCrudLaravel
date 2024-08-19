@props([
    'menuItems' => [],
    'class' => 'bg-white text-gray-700 hover:text-green-800 hover:font-bold',
    'activeClass' => 'bg-green-200 text-green-900 font-bold',
    'activeTextOnlyClass' => 'text-green-900 font-bold', // Classe para quando apenas o texto deve ficar ativo
])

@php
    $baseClass = 'flex items-center py-2 px-4 nav-item transition-all duration-300 ease-in-out';

    function generateItemClass($item, $baseClass, $class, $activeClass, $activeTextOnlyClass) {
        $route = $item['route'] ?? '#';

        // Verifica se a rota atual corresponde à rota principal
        $isActive = request()->is($route);

        // Verifica se algum submenu está ativo
        $isSubMenuActive = isset($item['subMenu']) && collect($item['subMenu'])->pluck('route')->contains(function($submenuRoute) {
            return request()->is($submenuRoute);
        });

        // Se o item principal estiver ativo, aplica o activeClass completo
        if ($isActive) {
            return "$baseClass $activeClass";
        }
        // Se algum submenu estiver ativo, aplica apenas a classe de texto ativo
        elseif ($isSubMenuActive) {
            return "$baseClass $activeTextOnlyClass";
        }
        // Caso contrário, aplica as classes padrão
        return "$baseClass $class";
    }

    function formatRoute($route) {
        return '/' . ltrim($route, '/');
    }
@endphp

<div {{ $attributes->merge(['class' => 'w-60 bg-white shadow-lg']) }}>
    <div class="p-6 text-xl font-semibold">
        {{ config('app.name', 'Dashboard') }}
    </div>
    <nav class="text-base pt-3">
        @foreach ($menuItems as $menuItem)
            <div>
                <a 
                @if(isset($menuItem['route']))
                    href="{{ formatRoute($menuItem['route'] ?? '#') }}" 
                @endif
                   class="{{ generateItemClass($menuItem, $baseClass, $class, $activeClass, $activeTextOnlyClass) }}">
                    <i class="{{ $menuItem['icon'] }} mr-3"></i>
                    <span>{{ $menuItem['name'] }}</span>
                    @if(isset($menuItem['subMenu']))
                        <i class="fas fa-chevron-down ml-auto"></i>
                    @endif
                </a>
                @if (isset($menuItem['subMenu']))
                    <div class="pl-6">
                        @foreach ($menuItem['subMenu'] as $subItem)
                            <a href="{{ formatRoute($subItem['route']) }}" 
                               class="{{ generateItemClass($subItem, $baseClass, $class, $activeClass, $activeTextOnlyClass) }}">
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
