<?php 
require 'clases\funciones.php';
//include 'main.php';
$objecto=new Funciones();

if(isset($_GET['cod'])){
	$cod=$_GET['cod'];
	$sql=$objecto->mostrar_mapas($cod);
	while($row=mysql_fetch_array($sql)){
		$data=$row;
		}
	
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consultar</title>
<link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.css">
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	$("#detdirecc").hide();
	/*$(function(){
	/*<?php if(isset($_GET['cod'])){?>
		alert("Registor realizado correctamente.");
		return obtenerRuta('<?php //echo $data['rt_origen'];?>', '<?php //echo $data['rt_destino']; ?>');
		<?php }?>
		});*/
		$("#detdireccver").click(function(){
		  $("#detdirecc").dialog();
		});
	});

</script>
<?php if(isset($_GET['cod'])){?>
		<script>
		function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    
  });

  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer({
    draggable: true,
    map: map,
    panel: document.getElementById('getDistance')
  });

  directionsDisplay.addListener('directions_changed', function() {
    computeTotalDistance(directionsDisplay.getDirections());
  });

  displayRoute('<?php echo $data['rt_origen'];?>,caucasia', '<?php echo $data['rt_destino']; ?>,bogota', directionsService,
      directionsDisplay);
	  
	  calculateAndDisplayRoute(directionsService, directionsDisplay);
  document.getElementById('mode').addEventListener('change', function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  });
}

function displayRoute(origin, destination, service, display) {
  service.route({
    origin: origin,
    destination: destination,
    //waypoints: [{location: 'Cocklebiddy, WA'}, {location: 'Broken Hill, NSW'}],
    travelMode: google.maps.TravelMode.DRIVING,
    avoidTolls: true
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      display.setDirections(response);
    } else {
      alert('Could not display directions due to: ' + status);
    }
  });
}

function computeTotalDistance(result) {
  var total = 0;
  var myroute = result.routes[0];
  for (var i = 0; i < myroute.legs.length; i++) {
    total += myroute.legs[i].distance.value;
  }
  total = total / 1000;
  document.getElementById('total').innerHTML = total + ' km';
}
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  var selectedMode = document.getElementById('mode').value;
  directionsService.route({
    origin:'<?php echo $data['rt_origen'];?>',  // Haight.
    destination:'<?php echo $data['rt_destino']; ?>',  // Ocean Beach.
    // Note that Javascript allows us to access the constant
    // using square brackets and a string value as its
    // "property."
    travelMode: google.maps.TravelMode[selectedMode]
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

		</script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmIBlcceTPcS6MJA6nZur2vzk4qGAvpHU&signed_in=true&callback=initMap"
        async defer></script>
		<?php }?>


</head>

<body>

<form action="#" name="form_ruta" onsubmit="obtenerRuta(this.desde.value, this.hasta.value); return false">
<hr>
<p></p>
<p></p>
<p>Progmación de la Ruta</p></hr></br>
<table width="100%" border="0" align="center" class="table">

   	<tr>
		<td align="right" >
			<strong>Desde:</strong>
			<input type="text" size="25" id="desde" name="desde" value=""/>
		</td>
   		<td align="right"> 
			<strong>Hasta:</strong>
			<input type="text" size="25" id="hasta" name="hasta" value=""  />
		</td>
		<td><select id="mode">
      <option value="DRIVING">Auto</option>
      <option value="WALKING">Caminando</option>
      <option value="BICYCLING">Bicicleta</option>
      <option value="TRANSIT">Tránsito</option>
    </select>
   		</td>
	</tr>
	<tr>
		<td align="center" colspan="3">
			<strong>Tipo trayecto: </strong>
			<input type="radio" name="tipo" id="tipo" value="2" checked/> En coche
			<input type="radio" name="tipo" id="tipo" value="1"  /> A pie
    		<input name="ruta" type="submit" value="Obtener ruta" />
   		</td>
	</tr>
</table>
</form>
<br/>
<div class="table-responsive">
<?php if(isset($_GET['cod'])){?>
<table align="center" class="table">
	<tr>
    <th>Origen</th>
    <th>Destino</th>
    <th>Tipo de Camion</th>
    <th>Tipo de Carga</th>
    <th>Fecha y Hora de Salida</th>
    <th>Fecha y Hora de Llegada</th>
		<th>
			<strong>Mapa</strong>
		</th>
        <td>
			<strong>Direcciones de la ruta</strong>
		</td>
	</tr>
	<tr>
    <td><?php echo $data['rt_origen']?></td>
    <td><?php echo $data['rt_destino']?></td>
    <td><?php echo $data['rt_tpcm']?></td>
    <td><?php echo $data['rt_tpcarg']?></td>
    <td><?php echo $data['rt_fechahrsalida']?></td>
    <td><?php echo $data['rt_fechahrllegad']?></td>
	  <td valign="top">
			<div id="map" style="width: 560px; height: 250px"></div>
		</td>
        <td align="center" valign="middle"><a id="detdireccver" href="#">Ver</a>
        <div id="detdirecc" title="Direcciones de la ruta">
			Distancia y tiempo: <span id="total"></span><div id="getDistance"></div>
			<div id="direcciones" style="width: 560px"></div>
        </div>    
		</td>
	</tr>
	<tr>
		
	</tr>
	<tr>
		
	</tr>
</table>
<?php } ?>
</div>
</body>
</html>
