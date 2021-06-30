<?php
require_once ("../modelo/pedidos.php");
	if (isset($_POST['accion'])) {
		$acc=$_POST['accion'];
		switch ($acc) {
			case 'Agregar':
				$ped = new Pedido();
					insertarPedido($ped);       		
			break;       	
			case 'Actualizar':
			  $ped = new Pedido(); 
				$id = $_POST['id'];
				modificarPedido($ped,$id);
			break;
			
		}
		
	}
	if (isset($_GET['accion'])) {
		$acc=$_GET['accion'];
		switch ($acc) {
			case 'Eliminar':
				$id = $_GET['id'];  
				$ped = new Pedido();
				eliminarPedido($ped,$id);          		
			break;
			case 'Confirmar':
			  $ped = new Pedido(); 
				$id = $_GET['id'];
				confirmarPedido($ped,$id);
			break;
		}
		
	}

	function insertarPedido($ped){		
		$fec=$_POST['fec'];
		$com=$_POST['com'];
		$can=$_POST['can'];
		$cli=$_POST['cli'];
		$hra=$_POST['hra'];

		$res = $ped->setPedido($fec,$com,$can,$cli,$hra);
		
		if ($res) {
		header('Location: ../Admin/pedidos.php');
		$ped->TerminarConexion();			
		}else{
		return "error al insertar".mysqli_error($this->db=Conectar::conexion());
		}
	}
	function mostrarPedidos($ped){

         $res = $ped->getPedido();

	}
	function mostrarFormPedidos($ped,$id){

         $res = $ped->getFormPedido($id);

	}
	
	function mostrarFormRegistro($ped){

         $res = $ped->getFormRegistro();

	}
	function eliminarPedido($ped,$id){         
       $res = $ped->delPedido($id);

       if ($res) {
		header("Location: ../Admin/pedidos.php");
		$ped->TerminarConexion();			
		}
	}
	function modificarPedido($ped,$id){
		$can=$_POST['can'];
		$hra=$_POST['hra'];
        
	    $res = $ped->modPedido($id,$can,$hra);

	    if ($res) {
		header("Location: ../Admin/pedidos.php");
		$ped->TerminarConexion();			
		} 	
	}
	function confirmarPedido($ped,$id){
        
	    $res = $ped->conPedido($id);

	    if ($res) {
		header("Location: ../Admin/pedidos.php");
		$ped->TerminarConexion();			
		} 	
	}	
?>