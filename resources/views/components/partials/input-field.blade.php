@props(['type' => 'text', 'name', 'label' => '', 'value' => '', 'placeholder' => '', 'required' => false, 'readonly' => false, 'disabled' => false])

<div class="mb-4" x-data="{ showPassword: false }">
    @if($label)
        <label for="{{ $name }}" class="block text-base font-medium text-gray-700">{{ $label }}</label>
    @endif
    
    <div class="relative">
        <input 
            id="{{ $name }}" 
            name="{{ $name }}" 
            :type="showPassword ? 'text' : '{{ $type }}'" 
            value="{{ old($name, $value) }}" 
            placeholder="{{ $placeholder }}" 
            @if($disabled) disabled @endif
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-50 disabled:bg-gray-200 {{ $readonly ? 'bg-gray-200 text-gray-500 cursor-not-allowed' : 'bg-white' }} border border-gray-200 placeholder-gray-500 text-base focus:outline-none focus:border-gray-400 focus:bg-white @error($name) border-red-500 @enderror"
            {{ $required ? 'required' : '' }}
            {{ $readonly ? 'readonly' : '' }}
        />
        
        @if($type === 'password')
            <span @click="showPassword = !showPassword" class="absolute inset-y-0 right-3 flex items-center cursor-pointer w-5">
                <i x-show="!showPassword" class="fas fa-eye-slash"></i>
                <i x-show="showPassword" class="fas fa-eye"></i>
            </span>
        @endif
    </div>

    @error($name)
        <span class="text-red-500 text-base">{{ $message }}</span>
    @enderror
</div>
