<?php //session_start();
if(!isset($_SESSION)){ 
session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modelo de Optimización
del transporte de carga
en Antioqui y Eje Cafetero </title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-3.1.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid">
<div class="banner"> 
            <div id="logotext">Modelo de Optimización <br> del transporte de carga<br> en Antioquia y Eje Cafetero 
            
            </div>
            <div align="right">Bienvenido <?php echo $_SESSION['userid'];?></div> 
            
        </div>
       <div class="regresar"><!--<div><a href="registroruta.php">Regresar</a></div>-->
       						<div><a href='logout.php'>Cerrar sesión</a></div>
      		</div>
    <ul id="menu">
    <li><a href="succes.php">Inicio</a></li>
    <li>
        <a href="#">Ruta</a>
        <ul>
            <li><a href="registroruta.php">Registro de ruta</a></li>
            <li><a href="consultarutas.php">Consultar rutas</a></li>            
        </ul>
    </li>
    <!--<li><a href="#">Work</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>-->
</ul> 
</div>    
</body>
</html>