<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmIBlcceTPcS6MJA6nZur2vzk4qGAvpHU"></script>
<style>
html, body, #map { margin: 0; padding: 0; height: 100% }

</style>
<div id="map"></div>
<script>
var center = new google.maps.LatLng(4.0652487, -81.9859376);
    
    var map = new google.maps.Map(document.getElementById('map'), {
        center: center,
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
  

var bounds = new google.maps.LatLngBounds();

// start coordinates
var start = ['medellin']

// end coordinates
var end = ['Bogota']

function initialize() {
   
    
  
    
    // Make clickable tooltip
   /*
	
    */ 
    
    for (var i=0; i < end.length; i++){alert(start[i]+"="+end [i]);
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
        travelMode: google.maps.DirectionsTravelMode.WALKING,
		avoidTolls: true
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
