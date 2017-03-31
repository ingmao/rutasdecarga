<?php //session_start();
if(!isset($_SESSION)){ 
session_start();	
}
if(isset($_SESSION['userid']) && $_SESSION['userid']!=''){
header("location:succes.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Modelo de Optimización
del transporte de carga
en Antioqui y Eje Cafetero  </title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<script src="js/jquery-3.1.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
   <div class="navbar-header">
   <img src="img/logo2.jpg"></br>
    Modelo de Optimización  del transporte de carga en Antioquia y Eje Cafetero
    </div>
      <form id="signin" class="navbar-form navbar-right" role="form" action="login.php" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="uname" type="text" class="form-control" name="uname" value="" placeholder="Ingrese usuario">                                        
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="pass" value="" placeholder="Ingrese Password">                                        
                        </div>
						
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <br>No se ha registrado !!!!<a href="reg.php">Registrese aquí</a>
                   </form>
     
    </div>
  </div>
</nav>
    <div class="container-fluid">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/slider_14.jpg" alt="Chania" width="100%" height="345">
      </div>

      <div class="item">
        <img src="img/templatemo_slide01.jpg" alt="Chania" width="100%" height="345">
      </div>
    
      <div class="item">
        <img src="img/SLIDER_ALCANZAMERCADOS-840x270.jpg" alt="Flower" width="100%" height="345">
      </div>

      <div class="item">
        <img src="img/mapas-slide.jpg" alt="Flower" width="100%" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

 </body>
</html>