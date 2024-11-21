@extends('client.layouts.app')

@section('title', 'Tìm đường')

@section('sass')
    @vite('resources/sass/map.sass')
@endsection

@section('js')
    <script src="{{ asset('js/map.js') }}"></script>
@endsection

@section('content')
<div>
    <form id="route-form">
        <label for="start">Điểm đi:</label>
        <input type="text" id="start" placeholder="Nhập điểm đi" required>
        
        <label for="end">Điểm đến:</label>
        <input type="text" id="end" placeholder="Nhập điểm đến" required>
        
        <button type="submit">Tìm đường</button>
    </form>

    <div id="map" class=""></div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidHJpbmhxdXlldGNoaWVuIiwiYSI6ImNtM2FlbG9pdTEwMTYybG9nN3JvNGczdHkifQ.Eb_L-H2kZlM0BKFCmnVgZw';
        
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/trinhquyetchien/cm3fly1fb001f01qzeaim5v8l',
            center: [108.220513, 16.068411], 
            zoom: 13
        });

        const busStops = [
        { name: 'Trạm 1', coordinates: [108.220513, 16.068411] },
        { name: 'Trạm 2', coordinates: [108.230000, 16.080000] },
        { name: 'Trạm 3', coordinates: [108.210000, 16.070000] }
    ];

    // Tạo các trạm dừng xe trên bản đồ
    busStops.forEach(stop => {
        // Tạo một Marker cho mỗi trạm dừng
        const marker = new mapboxgl.Marker()
            .setLngLat(stop.coordinates) // Vị trí trạm dừng
            .setPopup(
                new mapboxgl.Popup({ offset: 25 })
                    .setHTML(`<h3>${stop.name}</h3>`) // Hiển thị tên trạm trong Popup
            )
            .addTo(map); // Thêm vào bản đồ
    });
    </script>
</div>
@endsection
