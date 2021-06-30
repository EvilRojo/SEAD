<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost","id16327784_rojo","@RFC8eO0[?=w5D~<","id16327784_sead");
        $conexion->query(0);
        return $conexion;
    }
    
    public static function cerrar($cerrar){
			if(mysqli_close($cerrar)){
				return true;
			}else{
				return false;
			}
		}
}
?>