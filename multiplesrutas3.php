http://stackoverflow.com/questions/7320701/google-maps-api-adding-multiple-destinations-not-working-google-directions

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable directions</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 63%;
        height: 100%;
      }
      #right-panel {
        float: right;
        width: 34%;
        height: 100%;
      }
#right-panel {
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel select, #right-panel input {
  font-size: 15px;
}

#right-panel select {
  width: 100%;
}

#right-panel i {
  font-size: 12px;
}

      .panel {
        height: 100%;
        overflow: auto;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
    </div>
    <script>
    var center = new google.maps.LatLng(51.97559, 4.12565);
    
    var map = new google.maps.Map(document.getElementById('map'), {
        center: center,
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
  

var bounds = new google.maps.LatLngBounds();

// start coordinates
var start = ['Medellin', 
             'Bogota', 
             'cali',
             'pereira']

// end coordinates
var end = ['sonson', 
           'barranquilla', 
           'amalfi,Antioquia',
           'pasto']

function initialize() {
   
    
  
    
    // Make clickable tooltip
   /*
	
    */ 
    
    for (var i=0; i < end.length; i++){
      calcRoute(start[i], end [i]);
    }
    
    
    
}

function calcRoute(source,destination){
   
      var polyline = new google.maps.Polyline({
        path: [],
        strokeColor: '#FF0000',
        strokeWeight: 5,
        strokeOpacity: 0.5
    });
    
   var directionsService = new google.maps.DirectionsService(); 
    var request = { 
        origin:source, 
        destination: destination, 
        travelMode: google.maps.DirectionsTravelMode.WALKING 
    };
    
    directionsService.route(request, function(result, status) { 
        if (status == google.maps.DirectionsStatus.OK) {
            path = result.routes[0].overview_path;
            
            $(path).each(function(index, item) {
                polyline.getPath().push(item);
                bounds.extend(item);
            })
            
                // Custom infoWindow
	var toolTip = '<div id="map-box">'+
	    '<div id="siteNotice">'+
	    '</div>'+
	    '<h1 id="firstHeading" class="firstHeading">Ferry Route</h1>'+
	    '<div id="bodyContent">'+
	    '<p>Lorem ipsum dolor sit amet</p>'+
	    '</div>'+
	    '</div>';
    
	 createInfoWindow(polyline,toolTip); 
            
            polyline.setMap(map);
            map.fitBounds(bounds);
        }
    });  
    
  
	    

}

function createInfoWindow(poly,content) {
   
    google.maps.event.addListener(poly, 'click', function(event) {
        infowindow.content = content;
        infowindow.position = event.latLng;
        infowindow.open(map);
         alert("ja");
    });
}

google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmIBlcceTPcS6MJA6nZur2vzk4qGAvpHU&signed_in=true&callback=initMap"
        async defer></script>
  </body>
</html>