
<?php
session_start();
if ($_SESSION['autenticado'] !== TRUE) {
    header('Location: inicio.html');
	
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8; IE=9" />
    <link rel="shortcut icon" href="img/fav.png">
    <title>SEAD</title>
	<link rel="shortcut icon" href="resources/images/logo.ico" />
    <!-- Required meta tags -->
     <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-27100111-1"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  
   
    <link rel="stylesheet" type="text/css"  href="../css/main.css" >
    <link rel="stylesheet" type="text/css"  href="../css/320.css" >
    <link rel="stylesheet" type="text/css"  href="../css/768.css" >
    <link rel="stylesheet" type="text/css"  href="../css/992.css" >
    <link rel="stylesheet" type="text/css"  href="../css/1024.css" >
    <link rel="stylesheet" type="text/css"  href="../css/1440.css" >
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
   
  </head>
  <body class="vista">
    <nav>
        <div class="block33">
          <div class="menu">
            <div class="nav" id="nav-icon">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="idioma">SEAD</div>
          </div>
        </div>
       
        <div class="block33">
          <a href="indexA.php"><div class="logo text-center"><img src="../resources/images/logo.png" height='80px' width='100px'></div></a>
        </div>
        <div class="block33">
			<div class="donar">
			   <a href="../control/clientesU.php?accion=Salir"><img width="32px" height="32px" src="../images/salir.png"></a>
			</div>
		</div>
		<div class="clear"></div>
      </nav>
<!--body-->
            <div class="super_container"><br><br><br><br><br><br><br><br><br><br>
                            <h1 class="text-center ">Comidas</h1><br><center>
                                        <a href="formComida.php" class="btn btn-success">Agregar</a><br/><br/><br/>
                                        
										<div class="container"> 
                                        <table align="center" border=0px bgcolor=#E3DAC9 >
                                            <tr style="color:blue;">
                                                <td align="center" width="100px"><b>Nombre</b></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td align="center" width="300px"><b>Descripcion</b></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td align="center" width="70px"><b>Precio</b></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
												<td align="center" width="120px"><b>Acción</b></td>
                                            </tr>
                                            
                                      
          							  <output style="color:lightblue;" > <?php 
        	                            require_once("../modelo/comidas.php");
        	                            require_once('../control/comidas.php');
        	                            $com=new comida();
        	                            echo mostrarComidas($com);
        	  							?> 
          							  </output>
          							 
                                </table>
                                </div>
                            </center>
                </div>
				<br><br><br><br>
		
<!--fin de body-->

   <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/0fa6875ec1.js"></script>
    <script>
      $(document).ready(function(){
        $('#nav-icon').click(function(){
          $(this).toggleClass('animate-icon');
          $('#overlay').fadeToggle();
        });
      });

      $(document).ready(function(){
          $('#overlay').click(function(){
          $('#nav-icon').removeClass('animate-icon');
          $('#overlay').toggle();
          });
          
      });
       </script>
       <div id="overlay">
          <div>
            <ul>
                
                <li><a href="pedidos.php"><span class="numero">1-</span>Pedidos<span class="lineamenu"></span></a></li>
                <li><a href="clientes.php"><span class="numero">2-</span>Clientes <span class="lineamenu"></span></a></li>
				<li><a href="comidas.php"><span class="numero">3-</span>Comidas<span class="lineamenu"></span></a></li>
                <li><a href="calculo.php"><span class="numero">4-</span>Calculo de  ganancias <span class="lineamenu"></span></a></li>
                
                <span class="div"></span>
                <span class="redessociales" style="float:right;"><br>
              <a href="https://www.facebook.com" target="_blank" class="icono"><i class="fa-facebook" aria-hidden="true"></i></a>
              <a href="https://twitter.com" target="_blank" class="icono"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="https://www.youtube.com" target="_blank" class="icono"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
              <a href="https://soundcloud.com" target="_blank" class="icono"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>

            </span>
            </ul>
            
          </div>
      </div>
  </body>
</html>