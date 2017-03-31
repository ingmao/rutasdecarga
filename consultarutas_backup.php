<?php 
require 'clases\funciones.php';
include 'main.php';
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
	$(function(){
	<?php if(isset($_GET['cod'])){?>
		alert("Registor realizado correctamente.");
		return obtenerRuta('<?php echo $data['rt_origen'];?>', '<?php echo $data['rt_destino']; ?>');
		<?php }?>
		});
		$("#detdireccver").click(function(){
		  $("#detdirecc").dialog();
		});
	});

</script>
<!--------------------------------------------------------------
script maps
---------------------------------------------------------------->
<script src=" http://maps.google.com/?file=api&amp;v=2.x&amp;key=AIzaSyAjeAEsAVimwWFAbT6yVQBm80TdjwiQbDI"
      type="text/javascript"></script>
    <script type="text/javascript">
 
    var map;
    var gdir;
    var geocoder = null;
	function load() {
		if (GBrowserIsCompatible()) {
			map = new GMap2(document.getElementById("map"));	
			gdir = new GDirections(map, document.getElementById("direcciones"));
			GEvent.addListener(gdir, "load", onGDirectionsLoad);
        	GEvent.addListener(gdir, "error", mostrarError);	
			
		}
	}
		
    function obtenerRuta(desde, hasta) {
		var i;
		var tipo;
		//comprobar tipo trayecto seleccionado
    	for (i=0;i<document.form_ruta.tipo.length;i++){ 
       		if (document.form_ruta.tipo[i].checked){
          		break; 
			}
    	} 
    	tipo = document.form_ruta.tipo[i].value;
		if(tipo==1){
			//a pie
      		gdir.load("from: " + desde + " to: " + hasta,
                { "locale": "es", "travelMode" : G_TRAVEL_MODE_WALKING });
		}else{
			//conduccion
			gdir.load("from: " + desde + " to: " + hasta,
                { "locale": "es", "travelMode" : G_TRAVEL_MODE_DRIVING });
		}
    }
	
	function onGDirectionsLoad(){ 
		//resumen de tiempo y distancia
		document.getElementById("getDistance").innerHTML =gdir.getSummaryHtml(); 
	} 
	
	function mostrarError(){
	   	if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
	     	alert("No se ha encontrado una ubicación geográfica que se corresponda con la dirección especificada.");
	   	else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
	     	alert("No se ha podido procesar correctamente la solicitud de ruta o de códigos geográficos, sin saberse el motivo exacto del fallo.");
	   	else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
	     	alert("Falta el parámetro HTTP q o no tiene valor alguno. En las solicitudes de códigos geográficos, esto significa que se ha especificado una dirección vacía.");
		else if (gdir.getStatus().code == G_GEO_BAD_KEY)
	     	alert("La clave proporcionada no es válida o no coincide con el dominio para el cual se ha indicado.");
	   	else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
	     	alert("No se ha podido analizar correctamente la solicitud de ruta.");
	   	else alert("Error desconocido.");
	   
	}
    </script>

</head>

<body>

<form action="#" name="form_ruta" onsubmit="obtenerRuta(this.desde.value, this.hasta.value); return false">
<table align="center">

   	<tr>
		<td align="right" >
			<strong>Desde:</strong>
			<input type="text" size="25" id="desde" name="desde" value=""/>
		</td>
   		<td align="right"> 
			<strong>Hasta:</strong>
			<input type="text" size="25" id="hasta" name="hasta" value=""  />
		</td>
	
   		
	</tr>
	<tr>
		<td align="center" colspan="2">
			<strong>Tipo trayecto: </strong>
			<input type="radio" name="tipo" id="tipo" value="2" checked/> En coche
			<input type="radio" name="tipo" id="tipo" value="1"  /> A pie
    		<input name="ruta" type="submit" value="Obtener ruta" />
   		</td>
	</tr>
</table>
</form>
<br/>
<?php if(isset($_GET['cod'])){?>
<table align="center">
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
        <td valign="top"><a id="detdireccver" href="#">Ver</a>
        <div id="detdirecc" title="Direcciones de la ruta">
			Distancia y tiempo: <div id="getDistance"></div>
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
</body>
</html>
<script>
	window.onload=load;
	window.onunload=GUnload;
</script>