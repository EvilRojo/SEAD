
<?php
session_start();
if ($_SESSION['autenticado'] !== TRUE) {
    header('Location: inicio.html');
	
}else{
	if (isset($_SESSION['nombre'])) {
        $nom = $_SESSION['nombre'];
        $n = htmlspecialchars($nom);
	}else{
		$n='error';
	}
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
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-27100111-1');
</script>


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
          <a href="indexU.php"><div class="logo text-center"><img src="../resources/images/logo.png" height='80px' width='100px'></div></a>
         
        </div>
        <div class="block33">
          <div class="donar">
      </p>
	   
	   <a href="../control/clientesU.php?accion=Salir"><img width="32px" height="32px" src="../images/salir.png"></a>
   


         </div>
          
        </div>
         
        <div class="clear"></div>
		</nav>
		<br><br><br><br><br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<H2><?php echo "<p>¡Hola $n!</p>"; ?></H2>
					<br><br><br>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col-sm-5">
					<div class="row">
						<div class="col-10">
							<table border=0px bgcolor=#E3DAC9 >
                                <tr style="color:blue;">
                                    <td colspan="3" align="center" width="100px"><H1><b>Menu del dia</b></H1></td>
                                </tr>
                                <tr >
									<output style="color:lightblue;" > 
										<?php 
											require_once("../modelo/clientesU.php");
											require_once('../control/clientesU.php');
											$com=new comida();
											echo mostrarComidas($com);
										?> 
									</output>
								</tr>  
							</table>
						</div>
					</div>
				</div>
				<div class="col-sm-2 ">
					<input onclick="location.href='formPedidoU.php'" id="iniciaSesion" type="button" class="btn btn-success" accesskey="I" value="Pedir"><br><br>
				</div>
				<div class="col-sm-5 justify-content-end">
					<img style="border-radius:150px; color: black;" src="../resources/images/Comida-Mexicana-y-Tex-Mex.jpg" width="120%" height="120%" >
				</div>
			</div>
		</div>
<!-- footer -->
  

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
                
                <li><a href="formPedidoU.php"><span class="numero">1-</span>Pedir comida<span class="lineamenu"></span></a></li>
                <li><a href="modClienteU.php"><span class="numero">2-</span>Actualizar datos<span class="lineamenu"></span></a></li>
                <li><a href="pedidosU.php"><span class="numero">3-</span>Historial de pedidos<span class="lineamenu"></span></a></li>
                
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