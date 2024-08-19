<script>
    let map;
    let marker;

    function initMap() {
        const initialPosition = { lat: -23.550520, lng: -46.633308 }; // Posição inicial padrão (São Paulo)

        map = new google.maps.Map(document.getElementById('map'), {
            center: initialPosition,
            zoom: 15,
        });

        marker = new google.maps.Marker({
            position: initialPosition,
            map: map,
            draggable: true, // permite que o usuário mova o marcador
        });

        // Atualiza as coordenadas nos campos quando o marcador é movido
        google.maps.event.addListener(marker, 'dragend', function(event) {
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
        });
    }

    function showMapForAddress(addressData) {
        const latitude = parseFloat(addressData.latitude) || -23.550520;
        const longitude = parseFloat(addressData.longitude) || -46.633308;

        const position = { lat: latitude, lng: longitude };
        map.setCenter(position);
        marker.setPosition(position);

        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;
    }
</script>
