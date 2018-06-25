@extends('layouts.app')

@section('content')
    <div id="map"></div>
@endsection

@section('script')
    <script>
        var points = JSON.parse('{!! $data['points'] !!}');
        var center = JSON.parse('{!! $data['center'] !!}');
        var map, marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 18
            });
            marker = new google.maps.Marker({
                position: center,
                map: map,
                title: 'Localização'
            });
            var flightPath = new google.maps.Polyline({
                path: points,
                geodesic: true,
                strokeColor: '#407dff',
                strokeOpacity: 1.0,
                strokeWeight: 5
            });
            flightPath.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0rQXOqtFcs47NiHGviu3ahmmx-7RD2FU&callback=initMap"
            async defer></script>
@endsection
