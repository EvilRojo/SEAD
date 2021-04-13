<?php

include ('bd.php');
 
class pedido{

	    private $db;
		private $Pedido;
		public function __construct(){
			$this->db=Conectar::conexion();
			$this->Pedido=array();
		}

		public function getPedido(){
			$consulta=$this->db->query("select * from Pedidos ORDER BY ped_fec DESC;;");
			while ($filas=$consulta->fetch_assoc()) {
				$this->Pedido[]=$filas;
				$id=$filas['id_cliente'];
				$idC=$filas['id_com'];
				$consulta2=$this->db->query("select * from clientes where id_cli = '$id';");
				while($rag=mysqli_fetch_array($consulta2)){
					$consulta3=$this->db->query("select com_nom from comidas where id_com = '$idC';");
					while($reg=mysqli_fetch_array($consulta3)){
?>
					   <tr>
						<td><?php echo $filas['ped_fec'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><?php echo $reg['com_nom'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><?php echo $filas['ped_can'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><?php echo $rag['cli_nom'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><?php echo $rag['cli_dir'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><?php echo $filas['ped_hra'];?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>
						<?php
						if($filas['estatus']=='0'){
						?>
						Confirmar<a href="../control/Pedidos.php?accion=Confirmar&id=<?php echo $filas['id_ped'];?>" name="accion" value="Confirmar"><img width="32px" height="32px" src="../images/check.png">
						</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>
							
							<a href="../Admin/modPedido.php?id=<?php echo $filas['id_ped'];?>"><img width="32px" height="32px" src="../images/editA.png">
							</a>
							
							<a href="../control/Pedidos.php?accion=Eliminar&id=<?php echo $filas['id_ped'];?>" name="accion" value="Eliminar"><img width="32px" height="32px" src="../images/deleteAz.png">
							</a>
						
							
						</td>
						<?php
						}else{
						?>
						Entregado
						</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>
							
							<a href="../control/Pedidos.php?accion=Eliminar&id=<?php echo $filas['id_ped'];?>" name="accion" value="Eliminar"><img width="32px" height="32px" src="../images/deleteAz.png">
							</a>
						
							
						</td>
						<?php
						}
						?>
						</td>
						<input type="hidden" name="id" value="<?php echo $filas['id_ped'];?>">                         
						

					   </tr>
<?php				}
				}
			}
			return $this->Pedido;
		}
		
		public function getFormPedido($id){
			$consulta=$this->db->query("select * from Pedidos where id_ped = '$id';");
			if ($filas=$consulta->fetch_assoc()) {
				$this->Pedido[]=$filas;
				$id=$filas['id_cliente'];
				$idC=$filas['id_com'];
				$consulta2=$this->db->query("select cli_nom from clientes where id_cli = '$id';");
				while($rag=mysqli_fetch_array($consulta2)){
					$consulta3=$this->db->query("select com_nom,com_pre from comidas where id_com = '$idC';");
					while($reg=mysqli_fetch_array($consulta3)){
?>
				   <center>
	  <div class="find_title text-center"><h2>Editar pedido</h2></div>
	                        <div class="col-sm-12">
                                <div class="container">
                                    <form method="post" action="../control/Pedidos.php">
                                        <div class="panel panel-primary">
                                            <br></br>
											<div class="panel-body">
                                                <div class="form-group">
                                                    <label for="nombreMuseo"><h4>Comida: </h4></label>
													<select readonly required name="com" class="form-control">
                                                        <option value="<?php echo $filas['id_com'];?>"><?php echo $reg['com_nom'].'  $'.$reg['com_pre'];?></option>
                                                    </select>
												</div>
                                                
												<div class="form-group">
                                                    <label for="hor"><h4>Cliente </h4></label>
														<select readonly required name="cli" class="form-control">
															<option readonly value="<?php echo $filas['id_cliente'];?>"><?php echo $rag['cli_nom'];?></option>
														</select>
                                                </div>
												
                                                <div class="form-group">
                                                    <label for="telefono"><h4>Cantidad: </h4></label>
                                                    <input value="<?php echo $filas['ped_can'];?>" type="number" required="true" name="can" class="form-control" placeholder="Escribe la cantidad"/>
                                                </div>
												
												<div class="form-group">
                                                    <label for="hor"><h4>Hora de entrega </h4></label>
                                                    <input value="<?php echo $filas['ped_hra'];?>" type="time" required="true" name="hra" class="form-control" placeholder="Escribe la hora de entrega"/>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            		    <input type="submit" name="Actualizar" class="btn btn-primary btn-lg" Value="Actualizar">
                            			<input type="hidden" name="accion" value="Actualizar">
										<input type="hidden" name="id" value="<?php echo $filas['id_ped'];?>">
									</form>
							</center>
<?php			
							
					}
				}
			}
			return $this->Pedido;
		}
		
			public function getFormRegistro(){
			$consulta=$this->db->query("select * from clientes;");
			$consulta2=$this->db->query("select * from comidas;");
?>

	  <center>
	  <div class="find_title text-center"><h2>Formulario de Registro de Pedidos</h2></div>
	                        <div class="col-sm-6">
                                <div class="container">
                                    <form method="post" action="../control/Pedidos.php">
                                        <div class="panel panel-primary">
                                            <br></br>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="nombreMuseo"><h4>Comida: </h4></label>
													<select  required name="com" class="form-control">
                                                        <option value="">Selecciona...</option>
                                                        <?php
														while($filas=mysqli_fetch_array($consulta2)){
															echo'<option value="'.$filas[id_com].'">'.$filas[com_nom].'   $'.$filas[com_pre].'</option>';
														}
                                                        ?>  
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="telefono"><h4>Cantidad: </h4></label>
                                                    <input type="number" required="true" name="can" class="form-control" placeholder="Escribe la cantidad"/>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="hor"><h4>Cliente </h4></label>
													<select  required name="cli" class="form-control">
                                                        <option value="">Selecciona...</option>
                                                        <?php
														while($filas=mysqli_fetch_array($consulta)){
															echo'<option value="'.$filas[id_cli].'">'.$filas[cli_nom].'</option>';
														}
                                                        ?>  
                                                    </select>
                                                </div>
												
												<div class="form-group">
                                                    <label for="hor"><h4>Hora de entrega </h4></label>
                                                    <input type="time" required="true" name="hra" class="form-control" placeholder="Escribe la hora de entrega"/>
                                                </div>
												<input type="hidden" name="fec" class="form-control" value="<?php echo date("Y-m-d\TH-i");?>"/>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            		    <input type="submit" name="Agregar" class="btn btn-primary btn-lg" Value="Agregar">
                            			<input type="hidden" name="accion" value="Agregar">
									</form>
							</center>
<?php				
			
			return $this->Pedido;
		}

		public function setPedido($fec,$com,$can,$cli,$hra){
		    //$insertar=$this->db->query("INSERT INTO Pedidos (`id_ped`, `ped_fec`, `id_com`, `ped_can`, `id_cliente`, `ped_hra`, `estatus`) VALUES  ('','$fec','$com','$can','$cli','$hra','0')");
			if (!($modificar = $this->db->prepare("INSERT INTO Pedidos (`id_ped`, `ped_fec`, `id_com`, `ped_can`, `id_cliente`, `ped_hra`, `estatus`) VALUES  ('','$fec',?,?,?,'$hra','0')"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$modificar->bind_param("iii",$com,$can,$cli)) {
				echo "Falló la vinculación de parámetros: (" . $modificar->errno . ") " . $modificar->error;
			}

			if (!$modificar->execute()) {
				echo "Falló la ejecución: (" . $modificar->errno . ") " . $modificar->error;
			}
			if ($modificar) {
				return true;
			}else{
			    
				return "error a guardar los datos".mysqli_error($this->db=Conectar::conexion());
			}
		}

		public function delPedido($id){

			//$eliminar=$this->db->query("delete from Pedidos where id_ped='$id'");
			if (!($eliminar = $this->db->prepare("delete from Pedidos where id_ped= ?"))) {
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

		public function modPedido($id,$can,$hra){

			//$modificar=$this->db->query("UPDATE Pedidos SET ped_can='$can',ped_hra='$hra' where id_ped='$id'");
			if (!($modificar = $this->db->prepare("UPDATE Pedidos SET ped_can=?,ped_hra='$hra' where id_ped=?"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$modificar->bind_param("ii",$can,$id)) {
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

		public function conPedido($id){
			
			$modificar=$this->db->query("UPDATE Pedidos SET estatus= '1' where id_ped='$id'");
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
