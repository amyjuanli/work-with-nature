<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Map</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" type="text/css" />
 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false"> -->
    </script> 
</head>

<body>
    <div id="map"></div>
    <div id="list">
        <h1>Hello
            <?php echo 'Tomy'; ?>
        </h1>
        <p>These are your pieces of adopted rainforest. Take a look:</p>
        <table>
            <tr>
                <td>1</td>
                <td>lat</td>
                <td>lon</td>
                <td>10m</td>
            </tr>
            <tr>
                <td>1</td>
                <td>lat</td>
                <td>lon</td>
                <td>10m</td>
            </tr>
            <tr>
                <td>1</td>
                <td>lat</td>
                <td>lon</td>
                <td>10m</td>
            </tr>
        </table>
    </div>

    <script>
        // set the initial coords for the forest
        var initCoords = {
            lat: 10.398671,
            lng: -84.170756
        };

        /* 
        helper functions:
        #1 compute the size of land based on the amount of donation
        #2 
         */
        function getDistanceByDonation(amount) {
            var squareMeters = amount / 2.50;
            return Math.sqrt(squareMeters); // return width/height of square
        }

        function getCoordinatesByDistance(meters) {
            var coords = [{
                lat: 10.398671,
                lng: -84.170756
            }];
            var initLat = coords[0]['lat'];
            var initLng = coords[0]['lng'];
            var earth = 6378.137; //radius of the earth in kilometer

            coords.push(getCoordinate(initLat, initLng, 45, meters, earth));
            // coords.push(getCoordinate(initLat, initLng, 90, meters, earth));
            coords.push(getCoordinate(initLat, initLng, -180, meters, earth));
            // coords.push(getCoordinate(initLat, initLng, -90, meters, earth));
            coords.push(getCoordinate(initLat, initLng, 180, meters, earth));
            coords.push(getCoordinate(initLat, initLng, -270, meters, earth));

            return coords;
        }

        function getCoordinate(initLat, initLng, deg, meters, earth) {
            var m = (1 / ((2 * Math.PI / deg) * earth)) / 1000;  //1 meter in degree
            return {
                lat: initLat + meters * m,
                lng: initLng + (meters * m) / Math.cos(initLat * (Math.PI / 180)), 
            } 
         }


function createMarker(map, point, title) {
    return new google.maps.Marker({
        map: map,
        position: point,
        title: title
    });
}



    function initMap() {
     var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 10.398671, lng: -84.170756},
          mapTypeId: 'terrain'
        });

         var point = new google.maps.LatLng(10.398671, -84.170756);
         createMarker(map, getCoordinatesByDistance(10000)[0]);
         createMarker(map, getCoordinatesByDistance(10000)[1]);
        //  createMarker(map, getCoordinatesByDistance(10000)[2]);
        //  createMarker(map, getCoordinatesByDistance(10000)[3]);

    // Construct the polygon.
    var bermudaTriangle = new google.maps.Polygon({
        paths: getCoordinatesByDistance(10000),
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35
    });
    bermudaTriangle.setMap(map); 
    }



    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq3kPPoW_ZkOIUKaFHTWhgeZXwi-k_8rg&callback=initMap"></script>
</body>

</html>