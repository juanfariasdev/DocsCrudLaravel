<script async
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap">
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
