@extends('client.layouts.app')

@section('title', 'Tìm đường')

@section('js')
    <script src="{{ asset('js/map.js') }}"></script>
@endsection

@section('content')
<div>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css" rel="stylesheet">
    <h1>Tìm đường trên bản đồ</h1>

    <!-- Form nhập điểm đi và điểm đến -->
    <form id="route-form">
        <label for="start">Điểm đi:</label>
        <input type="text" id="start" placeholder="Nhập điểm đi" required autocomplete="off">
        <div id="start-suggestions" class="suggestions"></div> <!-- Gợi ý cho điểm đi -->
        
        <label for="end">Điểm đến:</label>
        <input type="text" id="end" placeholder="Nhập điểm đến" required autocomplete="off">
        <div id="end-suggestions" class="suggestions"></div> <!-- Gợi ý cho điểm đến -->
        
        <button type="submit">Tìm đường</button>
    </form>

    <div id="map" style="height: 600px;"></div>

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidHJpbmhxdXlldGNoaWVuIiwiYSI6ImNtM2FlbG9pdTEwMTYybG9nN3JvNGczdHkifQ.Eb_L-H2kZlM0BKFCmnVgZw'; // Thay thế bằng Mapbox Access Token của bạn

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [108.220513, 16.068411], // Đà Nẵng (trung tâm miền Trung)
            zoom: 13,
            pitch: 45,
            bearing: 0,
            antialias: true
        });

        // Thêm điều khiển zoom và xoay bản đồ
        map.addControl(new mapboxgl.NavigationControl());

        let routeLayer;

        // Lắng nghe sự kiện nhập vào ô tìm kiếm (auto-complete)
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

        // Hàm lấy gợi ý địa chỉ từ Mapbox Geocoding API (Giới hạn tìm kiếm trong miền Trung)
        function getSuggestions(query, inputId) {
            const bbox = [107.0, 12.0, 110.5, 17.5]; // Phạm vi của miền Trung Việt Nam
            const url = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(query)}.json?access_token=${mapboxgl.accessToken}&autocomplete=true&limit=5&bbox=${bbox.join(',')}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    displaySuggestions(data, inputId);
                })
                .catch(error => {
                    console.error('Lỗi khi lấy gợi ý:', error);
                });
        }

        // Hàm hiển thị gợi ý
        function displaySuggestions(data, inputId) {
            const suggestionsDiv = document.getElementById(inputId + '-suggestions');
            suggestionsDiv.innerHTML = ''; // Xóa các gợi ý cũ

            data.features.forEach(feature => {
                const suggestion = document.createElement('div');
                suggestion.classList.add('suggestion-item');
                suggestion.textContent = feature.place_name;

                // Lắng nghe sự kiện chọn gợi ý
                suggestion.addEventListener('click', function() {
                    document.getElementById(inputId).value = feature.place_name; // Đặt giá trị cho ô nhập
                    clearSuggestions(inputId); // Xóa gợi ý sau khi chọn
                });

                suggestionsDiv.appendChild(suggestion);
            });
        }

        // Hàm xóa gợi ý
        function clearSuggestions(inputId) {
            const suggestionsDiv = document.getElementById(inputId + '-suggestions');
            suggestionsDiv.innerHTML = '';
        }

        // Lắng nghe sự kiện gửi form
        document.getElementById('route-form').addEventListener('submit', function(event) {
            event.preventDefault();

            // Lấy địa chỉ từ các input
            const start = document.getElementById('start').value;
            const end = document.getElementById('end').value;

            // Dùng Geocoding API để chuyển đổi địa chỉ thành tọa độ
            Promise.all([
                geocode(start),
                geocode(end)
            ])
            .then(results => {
                const startCoords = results[0];
                const endCoords = results[1];

                // Gọi Directions API để lấy tuyến đường
                getRoute(startCoords, endCoords);
            })
            .catch(error => {
                alert('Không thể tìm thấy địa chỉ: ' + error.message);
            });
        });

        // Hàm geocode để chuyển đổi địa chỉ thành tọa độ
        function geocode(address) {
            const geocodeUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(address)}.json?access_token=${mapboxgl.accessToken}`;
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

        // Hàm lấy tuyến đường từ Directions API
        function getRoute(startCoords, endCoords) {
            const directionsUrl = `https://api.mapbox.com/directions/v5/mapbox/driving/${startCoords.join(',')};${endCoords.join(',')}?alternatives=false&steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`;

            fetch(directionsUrl)
                .then(response => response.json())
                .then(data => {
                    const route = data.routes[0].geometry;

                    // Kiểm tra và xóa tuyến đường cũ nếu có
                    if (map.getLayer('route-layer')) {
                        map.removeLayer('route-layer');
                        map.removeSource('route');
                    }

                    // Thêm tuyến đường mới vào bản đồ
                    map.addSource('route', {
                        type: 'geojson',
                        data: {
                            type: 'Feature',
                            properties: {},
                            geometry: route
                        }
                    });

                    map.addLayer({
                        id: 'route-layer',
                        type: 'line',
                        source: 'route',
                        layout: {
                            'line-join': 'round',
                            'line-cap': 'round'
                        },
                        paint: {
                            'line-color': '#FF5733',
                            'line-width': 4
                        }
                    });

                    // Zoom vào tuyến đường
                    map.fitBounds(route.coordinates);
                })
                .catch(error => {
                    console.error('Error fetching directions:', error);
                    alert('Không thể lấy tuyến đường.');
                });
        }
    </script>

    <style>
        /* Styling cho gợi ý */
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
