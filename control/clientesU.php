<?php
require_once ("../modelo/clientesU.php");
	if (isset($_POST['accion'])) {
		$acc=$_POST['accion'];
		switch ($acc) {
			case 'Agregar':
				$cli = new Cliente();
					insertarCliente($cli);       		
			break;       	
			case 'AgregarP':
				$ped = new Pedido();
					insertarPedido($ped);       		
			break;       	
			case 'Actualizar':
			  $cli = new Cliente(); 
				$id = $_POST['id'];
				modificarCliente($cli,$id);
			break;
			case 'Iniciar':
			  $cli = new Cliente(); 
				IniciarCliente($cli);
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
			case 'EliminarP':
				$id = $_GET['id'];  
				$ped = new Pedido();
				eliminarPedido($ped,$id);          		
			break;
			case 'Salir':
				$cli = new Cliente();
				SalirCliente($cli);          		
			break;
		}
		
	}

	function IniciarCliente($cli){		
		$cor=$_POST['cor'];
		$pas=$_POST['pas'];

		$res = $cli->selectCliente($cor,$pas);
		
		if ($res==0) {
			header('Location: ../vista/indexU.php');
			$cli->TerminarConexion();			
		}else{
		    if ($res==1) {
    			header('Location: ../Admin/indexA.php');
    			$cli->TerminarConexion();
		
		    }else{
		     if($res==9){
		         header('Location: ../vista/inicio.html?est=error');
		     }   
		    } 
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
		header('Location: ../vista/inicio.html');
		$cli->TerminarConexion();			
		}else{
		return "error al insertar".mysqli_error($this->db=Conectar::conexion());
		}
	}
	function mostrarClientes($cli){

         $res = $cli->getCliente();

	}
	function SalirCliente($cli){

         $res = $cli->outCliente();
		 
		if ($res) {
			header('Location: ../index.html');
			$cli->TerminarConexion();			
		}else{
			return "error al insertar".mysqli_error($this->db=Conectar::conexion());
		}

	}
	function mostrarFormClientes($cli,$id){

         $res = $cli->getFormCliente($id);

	}
	function mostrarFormRegistro($ped){

         $res = $ped->getFormRegistro();

	}
	function eliminarCliente($cli,$id){         
       $res = $cli->delCliente($id);

       if ($res) {
		header("Location: ../vista/clientes.php");
		$cli->TerminarConexion();			
		}
	}
	function mostrarPedidos($ped){

         $res = $ped->getPedido();

	}
	function mostrarComidas($com){

         $res = $com->getComida();

	}
	function modificarCliente($cli,$id){
		$nom=$_POST['nom'];
		$num=$_POST['num'];
		$dir=$_POST['dir'];
		$cor=$_POST['cor'];
		$pas=$_POST['pas'];
        
        
        
	    $res = $cli->modCliente($id,$nom,$num,$dir,$cor,$pas);

	    if ($res) {
		header("Location: ../vista/indexU.php");
		$cli->TerminarConexion();			
		} 	
	}
	function insertarPedido($ped){		
		$fec=$_POST['fec'];
		$com=$_POST['com'];
		$can=$_POST['can'];
		$hra=$_POST['hra'];

		$res = $ped->setPedido($fec,$com,$can,$hra);
		
		if ($res==true) {
		header('Location: ../vista/pedidosU.php');
		$ped->TerminarConexion();			
		}else{
		return "error al insertar".mysqli_error($this->db=Conectar::conexion());
		}
	}
	function eliminarPedido($ped,$id){         
       $res = $ped->delPedido($id);

       if ($res) {
		header("Location: ../vista/pedidosU.php");
		$ped->TerminarConexion();			
		}
	}
	
?>