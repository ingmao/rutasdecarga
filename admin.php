<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.1.1.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
$('#side-menu').click(function(e){
	var id = e.target.id;
	switch(id) {
		case "registroruta":
		$.get('registroruta.php', function(result) {
			$('#page-wrapper').empty();
			$('#page-wrapper').append(result);
		});
		break;
		case "consultarutas":
			$.get('consultarutas.php', function(result) {
			$('#page-wrapper').empty();
			$('#page-wrapper').append(result);
		});
		break;
		case "rutasgenerales":
		   //$.get('rutasgenerales.php', function(result) {
			$('#page-wrapper').empty();
			$('#page-wrapper').append('<div class="container"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="rutasgenerales.php"></iframe></div></div>');
		//});
		break;
		default:$('#page-wrapper').empty();
	}

});
<?php if(isset($_GET['cod'])){?>

$.get('consultarutas.php?cod=<?php if(isset($_GET['cod'])){echo $_GET['cod'];} ?>', function(result) {
	$('#page-wrapper').empty();
    $('#page-wrapper').append(result);
});
<?php } ?>
});
</script>
</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Motcatec Admin</a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-map-marker fa-fw"></i> Ruta<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#" id="registroruta"><i class='fa fa-car fa-fw'></i> Agregar Ruta</a>
                                </li>
                                <li>
                                    <a href="#" id="consultarutas"><i class='fa fa-map-marker fa-fw'></i> Consultar Rutas</a>
                                </li>
                                <li>
                                      <a href="#" id="rutasgenerales"><i class='fa fa-map-marker fa-fw'></i>Rutas Programadas</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Pelicula<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="#"><i class='fa fa-list-ol fa-fw'></i> Peliculas</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Genero<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="#"><i class='fa fa-list-ol fa-fw'></i> Generos</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            
        </div>

    </div>
    

    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
