<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false">
</script>

<script type="text/javascript">
    var spherical;
    var north, east, west, south;
    var coordsContainer = [];

    function initialize() {
        spherical = google.maps.geometry.spherical;

        var point = new google.maps.LatLng(55.623151, 8.48215); 
        var myOptions = {
                zoom: 10,
              center: point,
              mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
   
        createMarker(map, point, "point");
       
        north = spherical.computeOffset(point, 5000, 0);
        createMarker(map, north, "north"); 
         coordsContainer.push({lat:north.lat(), lng:north.lng()})
        
        west  = spherical.computeOffset(point, 5000, -90);
        createMarker(map, west, "west");  
         coordsContainer.push({lat:west.lat(), lng:west.lng()})
        
        south = spherical.computeOffset(point, 5000, 180);
        createMarker(map, south, "south");  
         coordsContainer.push({lat:south.lat(), lng:south.lng()})


        east  = spherical.computeOffset(point, 5000, 90);
        createMarker(map, east, "east");  
         coordsContainer.push({lat:east.lat(), lng:east.lng()})

// draw the shape
var shapes = new google.maps.Polygon({
        paths: coordsContainer,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35
    });
   shapes.setMap(map); 
///
      }
  
        function createMarker(map, point, title) {
         return new google.maps.Marker({
            map: map,
            position: point,
            title: title
        });
    } 






// only to test if get the right coordinates     
    function test() {
    alert("north=" + north.lat());
    alert('east='+east);
 
    
    }       

</script>
</head>

<body onload="initialize()">
<div id="map_canvas" style="width: 400px; height: 400px"></div>
<button onclick="test();">Test</button>

</body>

</html>


