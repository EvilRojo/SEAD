<?php
require_once ("../modelo/comidas.php");
	if (isset($_POST['accion'])) {
		$acc=$_POST['accion'];
		switch ($acc) {
			case 'Agregar':
				$com = new comida();
					insertarcomida($com);       		
			break;       	
			case 'Actualizar':
			  $com = new comida(); 
				$id = $_POST['id'];
				modificarcomida($com,$id);
			break;
		}
		
	}
	if (isset($_GET['accion'])) {
		$acc=$_GET['accion'];
		switch ($acc) {
			case 'Eliminar':
				$id = $_GET['id'];  
				$com = new comida();
				eliminarcomida($com,$id);          		
			break;
			
		}
		
	}

	function insertarcomida($com){		
		$nom=$_POST['nom'];
		$des=$_POST['des'];
		$pre=$_POST['pre'];

		$res = $com->setcomida($nom,$des,$pre);
		
		if ($res) {
		header('Location: ../Admin/comidas.php');
		$com->TerminarConexion();			
		}else{
		return "error al insertar".mysqli_error($this->db=Conectar::conexion());
		}
	}
	function mostrarcomidas($com){

         $res = $com->getcomida();

	}
	function mostrarFormcomidas($com,$id){

         $res = $com->getFormcomida($id);

	}
	function eliminarcomida($com,$id){         
       $res = $com->delcomida($id);

       if ($res) {
		header("Location: ../Admin/comidas.php");
		$com->TerminarConexion();			
		}
	}
	function modificarcomida($com,$id){
		$nom=$_POST['nom'];
		$des=$_POST['des'];
		$pre=$_POST['pre'];
		
	    $res = $com->modcomida($id,$nom,$des,$pre);

	    if ($res) {
		header("Location: ../Admin/comidas.php");
		$com->TerminarConexion();			
		} 	
	}	
?>