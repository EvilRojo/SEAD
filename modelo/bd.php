<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost","root","","sead");
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