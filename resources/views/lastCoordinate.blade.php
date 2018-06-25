@extends('layouts.app')

@section('content')
    <div id="map"></div>
@endsection

@section('script')
    <script>
        var map, marker,
            latlng = {lat: parseFloat('{{ $data["latitude"] }}'), lng: parseFloat('{{ $data["longitude"] }}')};

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 16
            });
            marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: 'Localização'
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0rQXOqtFcs47NiHGviu3ahmmx-7RD2FU&callback=initMap"
            async defer></script>
@endsection
