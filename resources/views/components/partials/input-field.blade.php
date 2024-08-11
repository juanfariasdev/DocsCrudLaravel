@props(['type' => 'text', 'name', 'label' => '', 'value' => '', 'placeholder' => '', 'required' => false])

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif
    
    <div class="relative">
        <input 
            id="{{ $name }}" 
            name="{{ $name }}" 
            type="{{ $type }}" 
            value="{{ old($name, $value) }}" 
            placeholder="{{ $placeholder }}" 
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white @error($name) border-red-500 @enderror"
            {{ $required ? 'required' : '' }}
        />
        
        @if($type === 'password')
            <span id="togglePassword_{{ $name }}" class="absolute inset-y-0 right-3 flex items-center cursor-pointer w-5">
                <i id="eyeOpen_{{ $name }}" class="fas fa-eye" style="display: none;"></i>
                <i id="eyeClosed_{{ $name }}" class="fas fa-eye-slash"></i>
            </span>
        @endif
    </div>

    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

@if($type === 'password')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword_{{ $name }}');
        const passwordField = document.querySelector('#{{ $name }}');
        const eyeOpen = document.querySelector('#eyeOpen_{{ $name }}');
        const eyeClosed = document.querySelector('#eyeClosed_{{ $name }}');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            if (type === 'text') {
                eyeOpen.style.display = 'inline';
                eyeClosed.style.display = 'none';
            } else {
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'inline';
            }
        });
    });
</script>
@endif
