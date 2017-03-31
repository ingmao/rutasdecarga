<?php session_start();
if(($_SESSION['userid']==null) || ($_SESSION['userid']=="")){?>
	Usted no se ha identificado<br/>
<a href="index.php">Por favor Iniciar sesión</a>
	
	<?php }else{?>

 <?php include 'admin.php';?>

<?php }?>