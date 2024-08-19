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
        

        <p>Marque com precisão o local!</p>
        <!-- Mapa para confirmação de localização (somente para empresas) -->
        <div id="map-container" class="hidden md:col-span-2 h-64">
            <div id="map" class="w-full h-full"></div>
        </div>
        </div>
    </div>

    {{ $slot }}

    <!-- Script para Autocompletar o CEP -->
    <x-partials.cep-script />
</form>

<script async
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
</script>

<script>
    let map;
    let marker;
    let geocoder;
    let searchAddress = false;

    // Inicializa o mapa com uma posição padrão
    function initMap() {
        const initialPosition = { lat: -21.6803986, lng: -45.919 }; // Posição inicial padrão (São Paulo)

        map = new google.maps.Map(document.getElementById('map'), {
            center: initialPosition,
            zoom: 18,
        });

        marker = new google.maps.Marker({
            position: initialPosition,
            map: map,
            draggable: true, // permite que o usuário mova o marcador
        });

        geocoder = new google.maps.Geocoder(); // Inicializa o geocoder

        // Atualiza as coordenadas nos campos quando o marcador é movido
        google.maps.event.addListener(marker, 'dragend', updateCoordinates);
    }

    // Função para atualizar as coordenadas com base na posição do marcador
    function updateCoordinates(event) {
        document.getElementById('latitude').value = event.latLng.lat();
        document.getElementById('longitude').value = event.latLng.lng();
    }

    // Função para geocodificar o endereço e atualizar o mapa
    function geocodeAddress(address) {
        geocoder.geocode({ address: address }, function(results, status) {
            if (status === 'OK') {
                const position = results[0].geometry.location;
                map.setCenter(position);
                marker.setPosition(position);

                document.getElementById('latitude').value = position.lat();
                document.getElementById('longitude').value = position.lng();
            } else {
                console.error('Geocode falhou: ' + status);
                alert('Falha ao buscar o endereço. Verifique as informações e tente novamente.');
            }
        });
    }

    // Função para construir o endereço completo a partir dos campos do formulário
    function getAddressFromForm() {
        const rua = document.getElementById('rua').value;
        const numero = document.getElementById('numero').value;
        const bairro = document.getElementById('bairro').value;
        const cidade = document.getElementById('cidade').value;
        const estado = document.getElementById('estado').value;

        if (rua && numero && bairro && cidade && estado) {
            return `${rua}, ${numero}, ${bairro}, ${cidade}, ${estado}`;
        } else {
            alert('Preencha todos os campos de endereço antes de pesquisar.');
            return null;
        }
    }

    // Evento do botão de pesquisa
    document.getElementById('search-address').addEventListener('click', function() {
        const userType = document.getElementById('type').value;
        if (userType === 'Empresa') {
            const address = getAddressFromForm();
            if (address) {
                searchAddress = true;
                geocodeAddress(address);
                handleUserTypeChange(); // Exibe o mapa se o usuário for do tipo Empresa
            }
        }
    });

    // Exibe ou oculta o mapa com base no tipo de usuário
    function handleUserTypeChange() {
        const userType = document.getElementById('type').value;
        const coordinatesFields = document.getElementById('coordinates-fields');
        const mapContainer = document.getElementById('map-container');

        if (userType === 'Empresa' && searchAddress) {
            coordinatesFields.classList.remove('hidden');
            mapContainer.classList.remove('hidden');
        } else {
            coordinatesFields.classList.add('hidden');
            mapContainer.classList.add('hidden');
        }
    }

    // Event listeners
    document.getElementById('type').addEventListener('change', handleUserTypeChange);

    // Verifica o tipo de usuário quando a página é carregada
    handleUserTypeChange();
</script>
