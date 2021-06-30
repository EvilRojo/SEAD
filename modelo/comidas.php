<?php

include ('bd.php');
 
class Comida{

	    private $db;
		private $comida;
		public function __construct(){
			$this->db=Conectar::conexion();
			$this->comida=array();
		}

		public function getcomida(){
			$consulta=$this->db->query("select * from comidas;");
			while ($filas=$consulta->fetch_assoc()) {
				$this->comida[]=$filas;
?>
                   <tr>
                   	<td><?php echo $filas['com_nom'];?></td>
                   	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   	<td><?php echo $filas['com_des'];?></td>
                   	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   	<td>$<?php echo $filas['com_pre'];?></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   	                      
                   	<td width="120px">
                   		
                   		<a href="modComida.php?id=<?php echo $filas['id_com'];?>"><img width="32px" height="32px" src="../images/editA.png">
                   		</a>
                   		
                   		<a href="../control/comidas.php?accion=Eliminar&id=<?php echo $filas['id_com'];?>" name="accion" value="Eliminar"><img width="32px" height="32px" src="../images/deleteAz.png">
                   		</a>
                   	
                   		
                   	</td>

                   </tr>
<?php				
			}
			return $this->comida;
		}
		
		public function getFormcomida($id){
			$consulta=$this->db->query("select * from comidas where id_com = '$id';");
			if ($filas=mysqli_fetch_array($consulta)) {
?>
				   <center>
	  <div class="find_title text-center"><h2>Editar a <?php echo $filas['com_nom'];?></h2></div>
	                        <div class="col-sm-12">
                                <div class="container">
                                    <form method="post" action="../control/comidas.php">
                                        <div class="panel panel-primary">
                                            <br></br>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="nombreMuseo"><h4>Nombre: </h4></label>
                                                    <input type="text" value="<?php echo $filas['com_nom'];?>" minlength="4" required="true" name="nom" class="form-control" placeholder="Escribe el nombre de la comida"></input>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="telefono"><h4>Precio: </h4></label>
                                                    <input type="number" min="1" pattern="^[0-9]+" value="<?php echo $filas['com_pre'];?>" required="true" name="pre" class="form-control" placeholder="Escribe el precio"/>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="hor"><h4>Descripcion</h4></label>
                                                    <textarea type="textarea" rows="5" cols="40" class="form-control" required="true" name="des" placeholder="Escribe la descripcion de la comida"><?php echo $filas['com_des'];?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            		    <input type="submit" name="Actualizar" class="btn btn-primary btn-lg" Value="Actualizar">
                            			<input type="hidden" name="accion" value="Actualizar">
										<input type="hidden" name="id" value="<?php echo $filas['id_com'];?>">
									</form>
							</center>
<?php				
			}
			return $this->comida;
		}

		public function setcomida($nom,$des,$pre){
		    
		    //$insertar=$this->db->query("INSERT INTO comidas(`id_com`,`com_nom`,`com_des`,`com_pre`) VALUES ('','$nom','$des','$pre')");
		    if (!($insertar = $this->db->prepare("INSERT INTO comidas(`id_com`,`com_nom`,`com_des`,`com_pre`) VALUES (null,?,?,?)"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$insertar->bind_param("ssd", $nom,$des,$pre)) {
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

		public function delcomida($id){

			//$eliminar=$this->db->query("delete from comidas where id_com='$id'");
			if (!($eliminar = $this->db->prepare("delete from comidas where id_com=?"))) {
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

		public function modcomida($id,$nom,$des,$pre){

			//$modificar=$this->db->query("UPDATE comidas SET com_nom='$nom',com_des='$des',com_pre='$pre' where id_com='$id'");
			if (!($modificar = $this->db->prepare("UPDATE comidas SET com_nom=?,com_des=?,com_pre=? where id_com=?"))) {
				echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$modificar->bind_param("ssdi", $nom,$des,$pre,$id)) {
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