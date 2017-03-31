<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style2.css" />
<script src="js/jquery-3.1.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
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
<form  class="form-horizontal" method="post" action="registration.php">
            Registro de usuarios:
            <div class="form-group">
             		<label for="inputName" class="control-label col-xs-2">Nombre y Apellido:</label>
               		<div class="col-xs-10">
                		<input type="text" class="form-control" name="fname" value="" placeholder="Ingrese el nombre y apellido"/>
                	</div>
               </div>
               <div class="form-group">
                    <label for="inputuserName" class="control-label col-xs-2">Nombre de usuario:</label>
                     <div class="col-xs-10">
                     <input type="text" class="form-control" name="uname" value="" placeholder="Ingrese el nombre de usuario"/>
                     </div>
                 </div>
                 <div class="form-group">
                    <label for="inputclave" class="control-label col-xs-2">Clave:</label>
                    <div class="col-xs-10">
                    <input type="password" class="form-control" name="pass" value="" placeholder="Ingrese la contraseña"/>
                    </div>
                 </div>
                 <div class="form-group">
         			<div class="col-xs-offset-2 col-xs-10">
                   		<button type="submit" name="reg" id="reg" class="btn btn-primary">Registrarse</button>
                        <button type="reset" class="btn btn-primary">Reset</button><br />
                    Ya registrado!!  <a href="index.php">Entre aquí</a>
                    </div>
                 </div>
                   
            
        </form>
        
</body>
</html>