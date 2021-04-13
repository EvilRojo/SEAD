<?php

include ('bd.php');
 
class Cliente{

	    private $db;
		private $Cliente;
		public function __construct(){
			$this->db=Conectar::conexion();
			$this->Cliente=array();
		}

		public function getCliente(){
			$consulta=$this->db->query("select * from clientes;");
			while ($filas=$consulta->fetch_assoc()) {
				$this->Cliente[]=$filas;
?>
                   <tr>
                   	<td><?php echo $filas['cli_nom'];?></td>
                   	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   	<td><?php echo $filas['cli_dir'];?></td>
                   	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   	<td><?php echo $filas['cli_num'];?></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><?php echo $filas['cli_cor'];?></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><?php echo $filas['cli_pas'];?></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   	<input type="hidden" name="id" value="<?php echo $filas['id_cli'];?>">                         
                   	<td width="120px">
                   		<?php
						if($filas['cli_tip']=='1'){
						?>
						<a href="../Admin/modCLiente.php?id=<?php echo $filas['id_cli'];?>"><img width="32px" height="32px" src="../images/editA.png">
                   		</a>
						<?php
						}else{
						?>
                   		<a href="../Admin/modCLiente.php?id=<?php echo $filas['id_cli'];?>"><img width="32px" height="32px" src="../images/editA.png">
                   		</a>
                   		
                   		<a href="../control/clientes.php?accion=Eliminar&id=<?php echo $filas['id_cli'];?>" name="accion" value="Eliminar"><img width="32px" height="32px" src="../images/deleteAz.png">
                   		</a>
						
						<?php
						}
						?>
                   		
                   	</td>

                   </tr>
<?php				
			}
			return $this->Cliente;
		}
		
		public function getFormCliente($id){
			$consulta=$this->db->query("select * from clientes where id_cli = '$id';");
			if ($filas=mysqli_fetch_array($consulta)) {
?>
				   <center>
	  <div class="find_title text-center"><h2>Editar a <?php echo $filas['cli_nom'];?></h2></div>
	                        <div class="col-sm-12">
                                <div class="container">
                                    <form method="post" action="../control/clientes.php">
                                        <div class="panel panel-primary">
                                            <br></br>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="nombreMuseo"><h4>Nombre: </h4></label>
                                                    <input type="text" minlength="4" required="true" name="nom" class="form-control" placeholder="Escribe el nombre del cliente" value="<?php echo $filas['cli_nom'];?>"></input>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="telefono"><h4>Teléfono: </h4></label>
                                                    <input type="text" required="true" name="num" class="form-control" placeholder="Escribe su telefono" value="<?php echo $filas['cli_num'];?>"/>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="hor"><h4>Direccion </h4></label>
                                                     <textarea type="textarea" rows="5" cols="40" class="form-control" required="true" name="dir" placeholder="Escribe la direccion del usuario"><?php echo $filas['cli_dir'];?></textarea>
												</div>
												
												<div class="form-group">
                                                    <label for="telefono"><h4>Correo electronico: </h4></label>
                                                    <input type="email" required="true" name="cor" class="form-control" placeholder="Escriba su correo electronico" value="<?php echo $filas['cli_cor'];?>"/>
                                                </div>
												
												<div class="form-group">
                                                    <label for="telefono"><h4>Contraseña: </h4></label>
                                                    <input type="password" required="true" name="pas" class="form-control" placeholder="Escriba su contraseña" value="<?php echo $filas['cli_pas'];?>"/>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            		    <input type="submit" name="Actualizar" class="btn btn-primary btn-lg" Value="Actualizar">
                            			<input type="hidden" name="accion" value="Actualizar">
										<input type="hidden" name="id" value="<?php echo $filas['id_cli'];?>">
									</form>
							</center>
<?php				
			}
			return $this->Cliente;
		}

		public function setCliente($nom,$num,$dir,$cor,$pas){
		    //$insertar=$this->db->query("INSERT INTO clientes(`id_cli`,`cli_nom`,`cli_num`,`cli_dir`,`cli_cor`,`cli_pas`) VALUES ('','$nom','$num','$dir','$cor','$pas')");
		    if (!($insertar = $this->db->prepare("INSERT INTO clientes(`id_cli`,`cli_nom`,`cli_num`,`cli_dir`,`cli_cor`,`cli_pas`) VALUES ('',?,?,?,?,?)"))) {
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
			if (!($modificar = $this->db->prepare("UPDATE clientes SET cli_nom=?,cli_num=?,cli_dir=?,cli_cor=?,cli_pas=? where id_cli=?"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$modificar->bind_param("sssssi", $nom,$num,$dir,$cor,$pas,$id)) {
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

?>