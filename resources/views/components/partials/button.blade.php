@props([
    'type' => 'submit', 
    'class' => 'button-primary', 
    'text' => 'Button', 
    'icon' => null,
    'id' => null
])

<button 
    type="{{ $type }}" 
    id="{{ $id }}"
    class="mt-5 tracking-wide font-semibold button-primary w-full py-4 rounded-lg transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none disabled:bg-gray-300 {{ $class }}">
    
    @if($icon)
        <i class="{{ $icon }} mr-2"></i>
    @endif
    
    <span>{{ $text }}</span>
</button>
