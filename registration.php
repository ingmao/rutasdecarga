<?php
require('clases/funciones.php');
$objeto=new Funciones();

$campos[0]=htmlspecialchars(trim($_POST['fname']));
$campos[1]=htmlspecialchars(trim($_POST['uname']));
$campos[2]=htmlspecialchars(trim($_POST['pass']));

if(isset($_POST['reg'])){
	if($objeto->insertar($campos)==true){
		header('location:welcome.php');
		}else{
			header('location:index.php');
			}
}

?>