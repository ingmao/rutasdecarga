<?php 
require('clases/funciones.php');
//include 'main.php';
$objeto=new Funciones();


if(isset($_POST['regrc'])){
	$campos[0]=trim($_POST['origen']);
	$campos[1]=trim($_POST['destino']);
	$campos[2]=trim($_POST['tpcm']);
	$campos[3]=trim($_POST['tpcarg']);
	$campos[4]=trim($_POST['fechsalhr']);
	$campos[5]=trim($_POST['fechlleghr']);
	if($objeto->insertarrutas($campos)==true){
		//header("location:consultarutas.php?cod=".mysql_insert_id());
		header("location:admin.php?cod=".mysql_insert_id());
		}else{
			 echo "<script language='javascript'>
		             alert('Se produjo un error. Intente nuevamente')
		           </script>";
			}
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de rutas </title>
<link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.css">
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
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
	$('.datepicker').datepicker({
					showSecond: true,
					dateFormat: "yy-mm-dd",
					timeFormat: 'hh:mm:ss'
	});
	});
});
</script>

</head>

<body>
<div>
  <form id="form1" name="form1" method="post" action="registroruta.php">
  <hr>Registro de Rutas</hr></br>
  <div class="form-group">
  <label for="origen">Origen</label>
  <input type="text" name="origen" id="origen" class="form-control" placeholder="Ingrese el origen por favor"/>
  </div>
  <div class="form-group">
  <label for="destino">Destino</label>
  <input type="text" name="destino" id="destino" class="form-control" placeholder="Ingrese el destino por favor"/>
  </div>
  <div class="form-group">
  <label for="tpcm">Tipo de camion</label>
  <input type="text" name="tpcm" id="tpcm" class="form-control" placeholder="Ingrese el tipo de camion"/> 
  </div>
  <div class="form-group">
  <label for="tpcarg">Tipo de Carga</label>
  <input type="text" name="tpcarg" id="tpcarg" class="form-control" placeholder="Ingrese el tipo de carga"/>
  </div>
  <div class="form-group">
  <label for="fechsalhr">Fecha Hora de Salida</label>
  <input type="text" name="fechsalhr" id="fechsalhr" class="form-control" placeholder="Ingrese la fecha y la hora de salida" readonly="readonly" data-provide="datepicker"/>
  </div>
  <div class="form-group">
  <label for="fechlleghr">Fecha Hora de Llegada</label>
  <input type="text" name="fechlleghr" id="fechlleghr" class="form-control" placeholder="Ingresa la fecha y hora de llegada" readonly="readonly" data-provide="datepicker"/>
  </div>
  <div style="text-align:center">
  <button type="submit" class="btn btn-primary" name="regrc" id="regrc">Registrar</button>
  </div>
  </form>

</div>


</body>
</html>