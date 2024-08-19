@props([
    'type' => 'submit', 
    'class' => 'button-primary', 
    'text' => 'Button', 
    'icon' => null,
])

<button 
    type="{{ $type }}" 
    class="mt-5 tracking-wide font-semibold {{ $class }} w-full py-4 rounded-lg transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
    
    @if($icon)
        <i class="{{ $icon }} mr-2"></i>
    @endif
    
    <span>{{ $text }}</span>
</button>
