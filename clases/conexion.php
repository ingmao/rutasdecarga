<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author ingmao
 */
class DBManager{
	var $conect;
    	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	function DBManager(){
		$this->BaseDatos = "rutasdecarga";
		/*$this->Servidor = "10.1.40.49";
		$this->Usuario = "inder";
		$this->Clave = "cte018GI";*/
		$this->Servidor = "localhost";
		$this->Usuario = "root";
		$this->Clave = "";
	}

	 function conectar() {
		if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
			echo"<h1> [:(] Error al conectar a la base de datos</h1>";	
			exit();
		}
		if (!@mysql_select_db($this->BaseDatos,$con)){
			echo "<h1> [:(] Error al seleccionar la base de datos</h1>";  
			exit();
		}
		$this->conect=$con;
		return true;	
	}
	
	
}
