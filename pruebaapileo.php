<?php require_once('Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_POST['fechsalhr'])) {
  $colname_Recordset1 = $_POST['fechsalhr'];
}
mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = sprintf("SELECT * FROM rc_rutas WHERE rt_fechahrsalida = %s", GetSQLValueString($colname_Recordset1, "date"));
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html><head>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.css">
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
<title>Travel modes in directions</title>
    <style>
      html, body {
 height: 100%;
 margin: 0;
 padding: 0;
 text-align: center;
      }
      #map {
        height: 100%;
      }
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

    </style>
    
         <script type="text/javascript">
jQuery().ready(function(){
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function(){
 $('#fechsalhr').datetimepicker({
     showSecond: true,
     dateFormat: "yy-mm-dd",
     timeFormat: 'hh:mm:ss'
     
    });
  $('#fechlleghr').datetimepicker({
     showSecond: true,
     dateFormat: "yy-mm-dd",
     timeFormat: 'hh:mm:ss'
     
    });
 });
});
</script>
</head>
<body>
    <div id="floating-panel">
    <b>Modo De Viaje: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
 
    <form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>ID</td>
      <td><label for="rt_id"></label>
      <input type="text" name="fechsalhr" id="fechsalhr" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="button" id="button" value="Buscar"></td>
    </tr>
  </table>
</form>
   </div>
<div id="map"></div>
<p>
  <script>
function initMap() {
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var directionsService = new google.maps.DirectionsService;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: {lat: 37.77, lng: -122.447}
  });
  directionsDisplay.setMap(map);

  calculateAndDisplayRoute(directionsService, directionsDisplay);
  document.getElementById('mode').addEventListener('change', function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  });
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  var selectedMode = document.getElementById('mode').value;
  directionsService.route({
    origin: "<?php echo $row_Recordset1['rt_origen']; ?>",  // Haight.
    destination: "<?php echo $row_Recordset1['rt_destino']; ?>",  // Ocean Beach.
    // Note that Javascript allows us to access the constant
    // using square brackets and a string value as its
    // "property."
    travelMode: google.maps.TravelMode[selectedMode]
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('No Hay Direccion ' + status);
    }
  });
}

      </script>
      
 
</p>
<p>&nbsp;</p>

<p>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1bY09RlwGtZ_IQdwiCCzZ47JXxjgp2DM&signed_in=true&callback=initMap"
        async defer></script>
</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>