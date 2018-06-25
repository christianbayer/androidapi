<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
    <div id="map"></div>
    <script>
        var points = JSON.parse('{!! $data['points'] !!}');
        var center = JSON.parse('{!! $data['center'] !!}');
        console.log(points, center);
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
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            flightPath.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0rQXOqtFcs47NiHGviu3ahmmx-7RD2FU&callback=initMap"
            async defer></script>
    </body>
</html>
