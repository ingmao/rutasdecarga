<?php

include_once("conexion.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funciones
 *
 * @author ingmao
 */
class Funciones {

    //put your code here
    var $con;

    //var $conm;

    function Funciones() {
        $this->con = new DBManager;
        //$this->conm=new DBManager2;
    }

    function verificarlogin($campos,&$result) {
        //print_r($campos);
        if ($this->con->conectar() == true) {

            $sql=mysql_query("SELECT * FROM rc_usuarios WHERE us_usuario='".$campos[0]."' AND us_password='".$campos[1]."'");    
            $cont=0;
            while ($row=  mysql_fetch_object($sql)){
            
            $cont++;
            $result=$row;
            }
            if($cont==1){
                return 1;
            }else{
                return 0;
            }
        }
    }
    function mostrar_temas(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT cb_temas.* FROM cb_temas WHERE cb_temas.tm_estado=1 ORDER BY cb_temas.tm_orden ASC");
			
		}
	}
	function mostrar_mapas($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM rc_rutas WHERE rt_id=".$id);
			}
		}
		function insertar($campos){
		
		if($this->con->conectar()==true){
					
		return mysql_query("INSERT INTO rc_usuarios (us_nombre,us_usuario,us_password) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."')");
				
		}
	}
	function insertarrutas($campos){
		
		if($this->con->conectar()==true){
					
		return mysql_query("INSERT INTO rc_rutas (rt_origen,rt_destino,rt_tpcm,rt_tpcarg,rt_fechahrsalida,rt_fechahrllegad) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."')");
				
		}
	}
	function generalmap(){
		
		if($this->con->conectar()==true){
			$sql=mysql_query("SELECT * FROM rc_rutas AS RT 
								WHERE 
								MONTH(RT.rt_fechahrsalida)=MONTH(CURDATE()) AND 
								YEAR(RT.rt_fechahrsalida)=YEAR(CURDATE()) AND
								TIMESTAMP(RT.rt_fechahrsalida)>=TIMESTAMP(CURDATE())");
								while($row=mysql_fetch_array($sql)){
									$rutas[]=$row;
									}
					return $rutas;
			}
		
		}	

}
