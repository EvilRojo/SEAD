<?php
require_once ("../modelo/clientes.php");
	if (isset($_POST['accion'])) {
		$acc=$_POST['accion'];
		switch ($acc) {
			case 'Agregar':
				$cli = new Cliente();
					insertarCliente($cli);       		
			break;       	
			case 'Actualizar':
			  $cli = new Cliente(); 
				$id = $_POST['id'];
				modificarCliente($cli,$id);
			break;
		}
		
	}
	if (isset($_GET['accion'])) {
		$acc=$_GET['accion'];
		switch ($acc) {
			case 'Eliminar':
				$id = $_GET['id'];  
				$cli = new Cliente();
				eliminarCliente($cli,$id);          		
			break;
			
		}
		
	}

	function insertarCliente($cli){		
		$nom=$_POST['nom'];
		$num=$_POST['num'];
		$dir=$_POST['dir'];
		$cor=$_POST['cor'];
		$pas=$_POST['pas'];

		$res = $cli->setCliente($nom,$num,$dir,$cor,$pas);
		
		if ($res) {
		header('Location: ../Admin/clientes.php');
		$cli->TerminarConexion();			
		}else{
		return "error al insertar".mysqli_error($this->db=Conectar::conexion());
		}
	}
	function mostrarClientes($cli){

         $res = $cli->getCliente();

	}
	function mostrarFormClientes($cli,$id){

         $res = $cli->getFormCliente($id);

	}
	function eliminarCliente($cli,$id){         
       $res = $cli->delCliente($id);

       if ($res) {
		header("Location: ../Admin/clientes.php");
		$cli->TerminarConexion();			
		}
	}
	function modificarCliente($cli,$id){
		$nom=$_POST['nom'];
		$num=$_POST['num'];
		$dir=$_POST['dir'];
		$cor=$_POST['cor'];
		$pas=$_POST['pas'];
		
	    $res = $cli->modCliente($id,$nom,$num,$dir,$cor,$pas);

	    if ($res) {
		header("Location: ../Admin/clientes.php");
		$cli->TerminarConexion();			
		} 	
	}	
?>