<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>login</title>
        
    </head>
    <body>
<?php

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('clases/funciones.php');

$objeto = new Funciones();


//VERIFICAMOS QUE SI EXISTA EL USUARIO
if (!isset($_SESSION['userid'])) {
    if (isset($_POST['login'])) {
        //INICIALIZAMOS LOS CAMPOS
        $campos = array($_POST['uname'],$_POST['pass']);

        if ($objeto->verificarlogin($campos, $result) == 1) {
            $_SESSION['userid'] = $result->us_nombre;
            header("location:succes.php");
        } else {
            echo '<div class="error">Contraseña Invalida <a href="index.php">Inténtalo de nuevo</a></div>';
        }
    }
}
?>
</body>
</html>
