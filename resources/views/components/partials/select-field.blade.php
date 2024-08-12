@props(['name', 'label' => '', 'options' => [], 'value' => '', 'placeholder' => '', 'required' => false])

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block text-base font-medium text-gray-700">{{ $label }}</label>
    @endif
    
    <div class="relative">
        <select 
            id="{{ $name }}" 
            name="{{ $name }}" 
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 text-base focus:outline-none focus:border-gray-400 focus:bg-white @error($name) border-red-500 @enderror appearance-none"
            {{ $required ? 'required' : '' }}
        >
            @if($placeholder)
                <option value="" disabled selected>{{ $placeholder }}</option>
            @endif

            @foreach($options as $option)
                <option value="{{ $option }}" {{ old($name, $value) == $option ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>

        <!-- Adicionando a seta customizada -->
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-600">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>

    @error($name)
        <span class="text-red-500 text-base">{{ $message }}</span>
    @enderror
</div>
