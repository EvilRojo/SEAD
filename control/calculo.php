<?php
	require_once ("../modelo/calculo.php");
	if (isset($_POST['accion'])) {
		$acc=$_POST['accion'];
		switch ($acc) {
			case 'calcular':
				$cal = new calculo();
				calculo($cal)
			break;       	
		}
		
	}
	
	function calculo($cal){		
		
		$inv=$_POST['inv'];
		$gan=$_POST['gan'];
		$num=$_POST['num'];
		
		$res = $cal->calcular($inv,$gan,$num);
		
		if ($res) {
		header('Location: ../vista/calculo2.php');
		$cal->TerminarConexion();			
		}else{
		return "error al insertar".mysqli_error($this->db=Conectar::conexion());
		}
	}
	
?>