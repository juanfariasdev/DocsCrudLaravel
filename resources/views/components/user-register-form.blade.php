@props(['action', 'method' => 'POST', 'user' => null])

@php
    $isPostMethod = $method === 'POST';
@endphp

<form method="POST" action="{{ $action }}" class="w-full mt-8">
    @csrf
    @if (!$isPostMethod)
        @method($method)
    @endif

    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Campo de Nome -->
        <x-partials.input-field  
            type="text" 
            name="name" 
            label="Nome" 
            value="{{ old('name', $user->name ?? '') }}" 
            placeholder="Digite o nome do usuário" 
            required
        />

        <!-- Campo de Email -->
        <x-partials.input-field  
            type="email" 
            name="email" 
            label="Email" 
            value="{{ old('email', $user->email ?? '') }}" 
            placeholder="Digite o email do usuário" 
            required
        />

        <!-- Campo de Senha -->
        <x-partials.input-field 
            type="password" 
            name="password" 
            label="Senha" 
            placeholder="{{ $isPostMethod ? 'Digite a senha' : 'Deixe em branco para manter a senha atual' }}" 
            required="{{ $isPostMethod }}"
        />

        <!-- Campo de Confirmação de Senha -->
        <x-partials.input-field 
            type="password" 
            name="password_confirmation" 
            label="Confirmar Senha" 
            placeholder="Confirme a senha"
            required="{{ $isPostMethod }}"
        />

        <!-- Campo de Tipo de Usuário -->
        <x-partials.select-field 
            name="type" 
            label="Tipo de Usuário" 
            :options="['Admin', 'Empresa', 'Funcionario', 'Convidado']" 
            value="{{ old('type', $user->type ?? '') }}"
            required
        />

        <!-- Campo de CEP -->
        <x-partials.input-field 
            type="text" 
            name="cep" 
            label="CEP" 
            id="cep"
            value="{{ old('cep', $user->address->cep ?? '') }}" 
            placeholder="Digite o CEP" 
            required 
        />

        <!-- Campo de Rua -->
        <x-partials.input-field 
            type="text" 
            name="rua" 
            label="Rua" 
            id="rua"
            value="{{ old('rua', $user->address->rua ?? '') }}" 
            placeholder="Digite o nome da rua" 
            required 
        />

        <!-- Campo de Número -->
        <x-partials.input-field 
            type="text" 
            name="numero" 
            label="Número" 
            value="{{ old('numero', $user->address->numero ?? '') }}" 
            placeholder="Digite o número" 
            required 
        />

        <!-- Campo de Bairro -->
        <x-partials.input-field 
            type="text" 
            name="bairro" 
            label="Bairro" 
            id="bairro"
            value="{{ old('bairro', $user->address->bairro ?? '') }}" 
            placeholder="Digite o bairro" 
            required 
        />

        <!-- Campo de Cidade -->
        <x-partials.input-field 
            type="text" 
            name="cidade" 
            label="Cidade" 
            id="cidade"
            value="{{ old('cidade', $user->address->cidade ?? '') }}" 
            placeholder="Digite a cidade" 
            required 
            readonly
        />

        <!-- Campo de Estado -->
        <x-partials.input-field 
            type="text" 
            name="estado" 
            label="Estado" 
            id="estado"
            value="{{ old('estado', $user->address->estado ?? '') }}" 
            placeholder="Digite o estado" 
            required 
            readonly
        />

        <x-partials.button type="button" class="mb-4 !mt-auto h-[57px]" id="search-address" text="Pesquisar Endereço" />

        <!-- Campos de Latitude e Longitude (somente para empresas) -->
        <div id="coordinates-fields" class="hidden md:col-span-2">
            <x-partials.input-field 
                type="text" 
                name="latitude" 
                label="Latitude" 
                id="latitude"
                value="{{ old('latitude', $user->empresa->latitude ?? '') }}" 
                placeholder="Latitude"
                readonly
            />

            <x-partials.input-field 
                type="text" 
                name="longitude" 
                label="Longitude" 
                id="longitude"
                value="{{ old('longitude', $user->empresa->longitude ?? '') }}" 
                placeholder="Longitude"
                readonly
            />
        
        <div class="bg-primary bg-red-300 p-4 rounded mb-6 text-center font-bold">
            Empresas devem ter localização confirmada no mapa!
        </div>
        <!-- Mapa para confirmação de localização (somente para empresas) -->
        <div id="map-container" class="hidden md:col-span-2 h-64">
            <div id="map" class="w-full h-full"></div>
        </div>
        </div>
    </div>

    {{ $slot }}

    <!-- Script para Autocompletar o CEP -->
    <x-partials.cep-script />
    <x-partials.maps-script />
</form>