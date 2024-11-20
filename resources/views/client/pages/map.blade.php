@extends('client.layouts.app')

@section('title', 'Tìm đường')

@section('js')
    <script src="{{ asset('js/map.js') }}"></script>
@endsection

@section('content')
<div>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css" rel="stylesheet" />
    <h1>Tìm đường trên bản đồ</h1>

    <form id="route-form">
        <label for="start">Điểm đi:</label>
        <input type="text" id="start" placeholder="Nhập điểm đi" required autocomplete="off">
        <div id="start-suggestions" class="suggestions"></div>
        
        <label for="end">Điểm đến:</label>
        <input type="text" id="end" placeholder="Nhập điểm đến" required autocomplete="off">
        <div id="end-suggestions" class="suggestions"></div>
        
        <button type="submit">Tìm đường</button>
    </form>

    <div id="map" style="height: 600px;"></div>

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = '{{ env('MAPBOX_ACCESS_TOKEN') }}';

        // Khởi tạo bản đồ với Mapbox GL JS
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/trinhquyetchien/cm3fly1fb001f01qzeaim5v8l',
            center: [108.220513, 16.068411], // Tọa độ trung tâm Đà Nẵng
            zoom: 13
        });

        let routeLayer;

        document.getElementById('start').addEventListener('input', function(event) {
            const query = event.target.value;
            if (query) {
                getSuggestions(query, 'start');
            } else {
                clearSuggestions('start');
            }
        });

        document.getElementById('end').addEventListener('input', function(event) {
            const query = event.target.value;
            if (query) {
                getSuggestions(query, 'end');
            } else {
                clearSuggestions('end');
            }
        });

        // Hàm gợi ý vị trí sử dụng API Geocoding của Mapbox
        function getSuggestions(query, inputId) {
            const bbox = [107.0, 12.0, 110.5, 17.5]; // Phạm vi của miền Trung Việt Nam
            const url = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(query)}.json?access_token={{ env('MAPBOX_ACCESS_TOKEN') }}&autocomplete=true&limit=5&bbox=${bbox.join(',')}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    displaySuggestions(data, inputId);
                })
                .catch(error => {
                    console.error('Lỗi khi lấy gợi ý:', error);
                });
        }

        function displaySuggestions(data, inputId) {
            const suggestionsDiv = document.getElementById(inputId + '-suggestions');
            suggestionsDiv.innerHTML = '';

            data.features.forEach(feature => {
                const suggestion = document.createElement('div');
                suggestion.classList.add('suggestion-item');
                suggestion.textContent = feature.place_name;

                suggestion.addEventListener('click', function() {
                    document.getElementById(inputId).value = feature.place_name;
                    clearSuggestions(inputId);
                });

                suggestionsDiv.appendChild(suggestion);
            });
        }

        function clearSuggestions(inputId) {
            const suggestionsDiv = document.getElementById(inputId + '-suggestions');
            suggestionsDiv.innerHTML = '';
        }

        document.getElementById('route-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const start = document.getElementById('start').value;
            const end = document.getElementById('end').value;

            // Dùng Mapbox Geocoding API để chuyển đổi địa chỉ thành tọa độ
            Promise.all([geocode(start), geocode(end)])
            .then(results => {
                const startCoords = results[0];
                const endCoords = results[1];
                getRoute(startCoords, endCoords);
            })
            .catch(error => {
                alert('Không thể tìm thấy địa chỉ: ' + error.message);
            });
        });

        function geocode(address) {
            const geocodeUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(address)}.json?access_token={{ env('MAPBOX_ACCESS_TOKEN') }}`;
            return fetch(geocodeUrl)
                .then(response => response.json())
                .then(data => {
                    const coords = data.features[0]?.geometry.coordinates;
                    if (!coords) {
                        throw new Error('Không tìm thấy địa chỉ.');
                    }
                    return coords;
                });
        }

        function getRoute(startCoords, endCoords) {
            const directionsUrl = `https://api.mapbox.com/directions/v5/mapbox/driving/${startCoords.join(',')};${endCoords.join(',')}?alternatives=false&steps=true&geometries=geojson&access_token={{ env('MAPBOX_ACCESS_TOKEN') }}`;

            fetch(directionsUrl)
                .then(response => response.json())
                .then(data => {
                    const route = data.routes[0].geometry;

                    if (routeLayer) {
                        map.removeLayer(routeLayer);
                    }

                    routeLayer = new mapboxgl.GeoJSONSource({
                        type: 'Feature',
                        geometry: route
                    });

                    map.addLayer({
                        id: 'route',
                        type: 'line',
                        source: routeLayer,
                        paint: {
                            'line-color': '#FF5733',
                            'line-width': 4
                        }
                    });

                    map.fitBounds(routeLayer.getBounds());
                })
                .catch(error => {
                    console.error('Lỗi khi lấy tuyến đường:', error);
                    alert('Không thể lấy tuyến đường.');
                });
        }
    </script>

    <style>
        .suggestions {
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            position: absolute;
            width: calc(100% - 20px);
            background-color: white;
            z-index: 1000;
        }

        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
    </style>
</div>
@endsection
