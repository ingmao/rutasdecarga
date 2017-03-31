<?php 
require 'clases\funciones.php';
//include 'main.php';
$objecto=new Funciones();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Rutas Generales</title>
    <style>
	html, body, #map { margin: 0; padding: 0; height: 100% }
      /*html, body {
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
      }*/
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
    </div>

<?php 
$rutas=$objecto->generalmap();
foreach($rutas as $key=>$val){
$origen []= $val['rt_origen'];
//array('Medellín','Bogota','Pereira','Caucasia');


$destino []= $val['rt_destino'];
//array('Sonsón','Manizales','Barranquilla','Medellín');
if($val['rt_origen']=='medellin' && $val['rt_destino']=='sonson'){
	$waypoints[]='waypoints: [{location:"Rionegro",stopover:true},{location:"La Ceja",stopover:true},{location:"'.$val['rt_destino'].'",stopover:true}],';
	}else{
		$waypoints[]="";
		}
}
$script= '
    <script>
function initialize() {

var pos = new google.maps.LatLng(4.0652487,  -81.9859376);

var myOptions = {
    zoom: 6,
    center: pos,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("map"), myOptions);

map.setCenter(pos);';
$n=0;
for($i=1;$i<=count($origen);$i++){
$script.= '
//FIRST POLYLINE SNAP TO ROAD

ChileTrip'.$i.' = ["'.$origen[$n].'","'.$destino[$n].'"];

var traceChileTrip'.$i.' = new google.maps.Polyline({
    path: ChileTrip'.$i.',
    strokeColor: getRandomColor(),
    strokeOpacity: 1,
    strokeWeight: 3
});

var service'.$i.' = new google.maps.DirectionsService(),traceChileTrip'.$i.',snap_path'.$i.'=[];
traceChileTrip'.$i.'.setMap(map);
for(j=0;j<ChileTrip'.$i.'.length-1;j++){
    service1.route({origin: ChileTrip'.$i.'[j],destination: ChileTrip'.$i.'[j+1],
	'.$waypoints[$n].'
	optimizeWaypoints: true,
	travelMode: google.maps.DirectionsTravelMode.DRIVING},function(result, status) {
        if(status == google.maps.DirectionsStatus.OK) {
            snap_path'.$i.' = snap_path'.$i.'.concat(result.routes[0].overview_path);
            traceChileTrip'.$i.'.setPath(snap_path'.$i.');
        } else alert("Directions request failed: "+status);        
    });
}
';
$n++;}
$script.=
'

};
    window.onload = function() { initialize();};
	function getRandomColor() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmIBlcceTPcS6MJA6nZur2vzk4qGAvpHU"
        async defer></script>';
		
		echo $script;
?>
  </body>
</html>