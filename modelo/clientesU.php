<?php

include ('bd.php');
 
class Cliente{

	    private $db;
		private $Cliente;
		public function __construct(){
			$this->db=Conectar::conexion();
			$this->Cliente=array();
		}

		
		public function getFormCliente($id){
			$consulta=$this->db->query("select * from clientes where id_cli = '$id';");
			if ($filas=mysqli_fetch_array($consulta)) {
?>		<center>
		<div class="find_title text-center"><h2>Editar a <?php echo $filas['cli_nom'];?></h2></div>
	        <div class="col-sm-12">
                <div class="container">
                    <form method="post" name="f1" action="../control/clientesU.php">
                        <div class="panel panel-primary">
							<br></br>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="nombreMuseo"><h4>Nombre: </h4></label>
                                    <input type="text" minlength="4" value="<?php echo $filas['cli_nom'];?>" required="true" name="nom" class="form-control" placeholder="Escribe el nombre del cliente"></input>
                                </div>
                                <div class="form-group">
                                    <label for="telefono"><h4>Teléfono: </h4></label>
                                    <input type="number" onBlur="comprobarnumero()" pattern="^[0-9]+" value="<?php echo $filas['cli_num'];?>" required="true" name="num" class="form-control" placeholder="Escribe su telefono"/>
                                </div>
                                <div class="form-group">
                                    <label for="hor"><h4>Direccion </h4></label>
                                    <textarea type="textarea" rows="5" cols="40" class="form-control" required="true" name="dir" placeholder="Escribe la direccion del usuario"><?php echo $filas['cli_dir'];?></textarea>
                                </div>
								<div class="form-group">
                                    <label for="telefono"><h4>Correo electronico: </h4></label>
                                    <input type="email" value="<?php echo $filas['cli_cor'];?>" required="true" name="cor" class="form-control" placeholder="Escriba su correo electronico"/>
                                </div>
								<div class="form-group">
                                    <label for="telefono"><h4>Nueva Contraseña: </h4></label>
                                    <input type="password" value="<?php echo $filas['cli_pas'];?>" required="true" name="pas" class="form-control" placeholder="Escriba su contraseña"/>
                                </div>
												
                            </div>
                        </div>
                </div>
            </div>
                <input type="submit" style="display:none" name="Actualizar" class="btn btn-primary btn-lg" Value="Actualizar">
                <input type="hidden" name="accion" value="Actualizar">
				<input type="hidden" name="id" value="<?php echo $filas['id_cli'];?>">
					</form>
		</center><br></br><br></br>

<?php				
			}
			return $this->Cliente;
		}

		public function selectCliente($cor,$pas) {
			$val=0;
			$consulta=$this->db->query("select * from clientes where cli_cor = '$cor' and cli_pas = '$pas';");
			if ($filas=mysqli_fetch_array($consulta)) {
				if($filas['cli_tip'] == 0){					
					session_start();
					$id=$filas['id_cli'];
					$nom=$filas['cli_nom'];
					$_SESSION["id"]=$id;
					$_SESSION['nombre']=$nom;
					$_SESSION['autenticado'] = TRUE;
				}else{
					session_start();
					$id=$filas['id_cli'];
					$nom=$filas['cli_nom'];
					$_SESSION["id"]=$id;
					$_SESSION['nombre']=$nom;
					$_SESSION['autenticado'] = TRUE;
					$val=1;
				}
			}else{
			    $val=9;
			    session_start();
    			$_SESSION["id"]=0;
    			$_SESSION['nombre']="";
    			$_SESSION['autenticado'] =FALSE;
    			$_SESSION["error"]=1;
			}
			if ($consulta) {
				return $val;
			}else{
				return "error al iniciar".mysqli_error($this->db=Conectar::conexion());
			}
		}

		public function setCliente($nom,$num,$dir,$cor,$pas){
			//$insertar=$this->db->query("INSERT INTO clientes(`id_cli`,`cli_nom`,`cli_num`,`cli_dir`,`cli_cor`,`cli_pas`) VALUES ('','$nom','$num','$dir','$cor','$pas')");
		    if (!($insertar = $this->db->prepare("INSERT INTO clientes(`id_cli`,`cli_nom`,`cli_num`,`cli_dir`,`cli_cor`,`cli_pas`,`cli_tip`) VALUES (null,?,?,?,?,?,0)"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$insertar->bind_param("sssss", $nom,$num,$dir,$cor,$pas)) {
				echo "Falló la vinculación de parámetros: (" . $insertar->errno . ") " . $insertar->error;
			}

			if (!$insertar->execute()) {
				echo "Falló la ejecución: (" . $insertar->errno . ") " . $insertar->error;
			}
           
			if ($insertar) {
				return true;
			}else{
			    
				return "error a guardar los datos".mysqli_error($this->db=Conectar::conexion());
			}
		}
		
		public function outCliente(){
			session_start();
			$_SESSION["id"]=0;
			$_SESSION['nombre']="";
			$_SESSION['autenticado'] =FALSE;
			return true;
		}
		
		public function delCliente($id){

			//$eliminar=$this->db->query("delete from clientes where id_cli='$id'");
			if (!($eliminar = $this->db->prepare("delete from clientes where id_cli=?"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$eliminar->bind_param("i",$id)) {
				echo "Falló la vinculación de parámetros: (" . $eliminar->errno . ") " . $eliminar->error;
			}

			if (!$eliminar->execute()) {
				echo "Falló la ejecución: (" . $eliminar->errno . ") " . $eliminar->error;
			}
			if ($eliminar) {
				return true;
			}else{
				return "error al eliminar".mysqli_error($this->db=Conectar::conexion());
			}
		}

		public function modCliente($id,$nom,$num,$dir,$cor,$pas){

			//$modificar=$this->db->query("UPDATE clientes SET cli_nom='$nom',cli_num='$num',cli_dir='$dir',cli_cor='$cor',cli_pas='$pas' where id_cli='$id'");
			if (!($modificar = $this->db->prepare("UPDATE clientes SET cli_nom=?,cli_num=?,cli_dir=?,cli_cor=?,cli_pas=? where id_cli=?"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$modificar->bind_param("sssssi",$nom,$num,$dir,$cor,$pas,$id)) {
				echo "Falló la vinculación de parámetros: (" . $modificar->errno . ") " . $modificar->error;
			}

			if (!$modificar->execute()) {
				echo "Falló la ejecución: (" . $modificar->errno . ") " . $modificar->error;
			}
			if($modificar) {
				return true;
			}else{
				return "error al modificar".mysqli_error($this->db=Conectar::conexion());
			}
		}

		public function TerminarConexion(){
			if($this->db=Conectar::cerrar($this->db=Conectar::conexion())){
				echo "Conexion Terminada";
			}else{
				echo "Algo fallo";
			}
		}		
}

class Pedido{

	    private $db;
		private $Pedido;
		public function __construct(){
			$this->db=Conectar::conexion();
			$this->Pedido=array();
		}

		public function getPedido(){
			$cli=$_SESSION["id"];
			$consulta=$this->db->query("select * from pedidos where id_cliente='$cli'");
		while ($filas=$consulta->fetch_assoc()) {
				$this->Pedido[]=$filas;
				$com=$filas['id_com'];
				$consulta3=$this->db->query("select com_nom from comidas where id_com = '$com';");
				
					while($reg=$consulta3->fetch_assoc()){
	?>
					   <tr>
						<td><?php echo $filas['ped_fec'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><?php echo $reg['com_nom'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><?php echo $filas['ped_can'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><?php echo $filas['ped_hra'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>
						<?php
						if($filas['estatus']=='0'){
						?>
						En proceso
						<td>
							
							<a href="../control/clientesU.php?accion=EliminarP&id=<?php echo $filas['id_ped'];?>" name="accion" value="Eliminar"><img width="32px" height="32px" src="../images/deleteAz.png">
							</a>
						
							
						</td>
						<?php
						}else{
						?>
						Entregado
						<td>
						
							
						</td>
						<?php
						}
						?>
						</td>
						<input type="hidden" name="id" value="<?php echo $filas['id_ped'];?>">                       
						

					   </tr>
<?php				}
				

			}
			return $this->Pedido;
		}
		

		
			public function getFormRegistro(){
			$consulta=$this->db->query("select * from comidas;");
?>

	  <center>
	  <div class="find_title text-center"><h2>Ordena lo que te encanta!!!</h2></div>
	                        <div class="col-sm-12">
                                <div class="container">
                                    <form method="post" action="../control/clientesU.php">
                                        <div class="panel panel-primary">
                                            <br></br>
                                            <div class="panel-body">
                                                <div class="form-group">
													<select  required name="com" class="form-control">
                                                        <option value="">Selecciona tu comida deseada:</option>
                                                        <?php
														while($filas=mysqli_fetch_array($consulta)){
                                                        echo'<option value="'.$filas[id_com].'">'.$filas[com_nom].'   $'.$filas[com_pre].'</option>';
														}
                                                        ?>  
                                                    </select>
                                                </div>
												
                                                <div class="form-group">
													<div class="row">
														<div class="col-sm-6">
															<label for="telefono"><h4>Cantidad: </h4></label>
														</div>
														<div class="col-sm-6">
															<input type="number" min="1" pattern="^[0-9]+" required="true" name="can" class="form-control" placeholder="Escribe la cantidad"/>
														</div>
													</div>
                                                </div>
												
												<div class="form-group">
													<div class="row">
														<div class="col-sm-6">
															<label for="telefono"><h4>Hora de entrega: </h4></label>
														</div>
														<div class="col-sm-6">
															<input type="time" required="true" name="hra" class="form-control" placeholder="Escribe la hora de entrega"/>
														</div>
													</div>
                                                </div>
												<input type="hidden" name="fec" class="form-control" value="<?php echo date("Y-m-d\TH-i");?>"/>
                                            </div>
                                        </div>
                                </div>
                            </div>
								<div class="row">
									<div class="col-sm-9">
															
									</div>
									<div class="col-sm-3">
										<input type="submit" name="Agregar" class="btn btn-primary btn-lg" Value="Pedir">
									</div>
								</div>
                            		    
                            			<input type="hidden" name="accion" value="AgregarP">
									</form>
							</center>
<?php				
			
			return $this->Pedido;
		}

		public function setPedido($fec,$com,$can,$hra){
			session_start();
			$cli=$_SESSION["id"];
		    //$insertar=$this->db->query("INSERT INTO Pedidos (`id_ped`, `ped_fec`, `id_com`, `ped_can`, `id_cliente`, `ped_hra`, `estatus`) VALUES  ('','$fec','$com','$can','$cli','$hra','0')");
		    if (!($insertar = $this->db->prepare("INSERT INTO pedidos (`id_ped`, `ped_fec`, `id_com`, `ped_can`, `id_cliente`, `ped_hra`, `estatus`) VALUES  (null,'$fec',?,?,?,'$hra','0')"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$insertar->bind_param("iii",$com,$can,$cli)) {
				echo "Falló la vinculación de parámetros: (" . $insertar->errno . ") " . $insertar->error;
			}

			if (!$insertar->execute()) {
				echo "Falló la ejecución: (" . $insertar->errno . ") " . $insertar->error;
			}
			if ($insertar) {
				return true;
			}else{
			    
				return "error a guardar los datos".mysqli_error($this->db=Conectar::conexion());
			}
		}

		public function delPedido($id){

			//$eliminar=$this->db->query("delete from Pedidos where id_ped='$id'");
			if (!($eliminar = $this->db->prepare("delete from pedidos where id_ped= ?"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$eliminar->bind_param("i",$id)) {
				echo "Falló la vinculación de parámetros: (" . $eliminar->errno . ") " . $eliminar->error;
			}

			if (!$eliminar->execute()) {
				echo "Falló la ejecución: (" . $eliminar->errno . ") " . $eliminar->error;
			}
			if ($eliminar) {
				return true;
			}else{
				return "error al eliminar".mysqli_error($this->db=Conectar::conexion());
			}
		}

		
		public function TerminarConexion(){
			if($this->db=Conectar::cerrar($this->db=Conectar::conexion())){
				echo "Conexion Terminada";
			}else{
				echo "Algo fallo";
			}
		}		
}

class Comida{
	
	private $db;
	private $Comida;
	public function __construct(){
		$this->db=Conectar::conexion();
		$this->Comida=array();
	}
		
	public function getComida(){
		$consulta=$this->db->query("select * from comidas;");
		while ($filas=$consulta->fetch_assoc()) {
			$this->comida[]=$filas;
?>
			<tr><td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
			<tr>
				<td align="left" width="250px"><b><?php echo $filas['com_nom'];?></b></td>
				<td align="center" width="30px">&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td align="center" width="20px">$<?php echo $filas['com_pre'];?></td>
            </tr>
			<tr>
				<td align="left" width="300px" colspan="3"><?php echo $filas['com_des'];?></td>
			</tr>
<?php				
		}
		return $this->comida;
	}
}
?>