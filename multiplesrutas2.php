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
    function initMap() {

var pos = new google.maps.LatLng(-26.431228,-69.572755);

var myOptions = {
    zoom: 5,
    center: pos,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById('map'), myOptions);

map.setCenter(pos);


//FIRST POLYLINE SNAP TO ROAD

ChileTrip1 = ['medellin','sonson'
    
    ];

var traceChileTrip1 = new google.maps.Polyline({
    path: ChileTrip1,
    strokeColor: "red",
    strokeOpacity: 1.0,
    strokeWeight: 2
});

var service1 = new google.maps.DirectionsService(),traceChileTrip1,snap_path1=[];
traceChileTrip1.setMap(map);
for(j=0;j<ChileTrip1.length-1;j++){
    service1.route({origin: ChileTrip1[j],destination: ChileTrip1[j+1],travelMode: google.maps.DirectionsTravelMode.DRIVING},function(result, status) {
        if(status == google.maps.DirectionsStatus.OK) {
            snap_path1 = snap_path1.concat(result.routes[0].overview_path);
            traceChileTrip1.setPath(snap_path1);
        } else alert("Directions request failed: "+status);        
    });
}

//SECOND POLYLINE SNAP TO ROAD

ChileTrip2 = ['bogota','cali'
    ];

var traceChileTrip2 = new google.maps.Polyline({
    path: ChileTrip2,
    strokeColor: "blue",
    strokeOpacity: 1.0,
    strokeWeight: 2
});

var service2 = new google.maps.DirectionsService(),traceChileTrip2,snap_path2=[];
traceChileTrip2.setMap(map);
for(j=0;j<ChileTrip2.length-1;j++){
    service2.route({origin: ChileTrip2[j],destination: ChileTrip2[j+1],travelMode: google.maps.DirectionsTravelMode.DRIVING},function(result, status) {
        if(status == google.maps.DirectionsStatus.OK) {
            snap_path2 = snap_path2.concat(result.routes[0].overview_path);
            traceChileTrip2.setPath(snap_path2);
        } else alert("Directions request failed: "+status);        
    });
}

    };
    window.onload = function() { initialize();};
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmIBlcceTPcS6MJA6nZur2vzk4qGAvpHU&signed_in=true&callback=initMap"
        async defer></script>
  </body>
</html>