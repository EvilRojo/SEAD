<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8; IE=9" />
    <link rel="shortcut icon" href="../img/fav.png">
    <title>SEAD</title>
	<link rel="shortcut icon" href="../resources/images/logo.ico" />
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
          <a href="../index.html"><div class="logo text-center"><img src="../resources/images/logo.png" height='80px' width='100px'></div></a>
         
        </div>
        <div class="block33">
          <div class="donar">
			<input onclick="location.href='inicio.html'" id="iniciaSesion" type="button" class="btn btn-success" accesskey="I" value="Login">
			</div>
        </div>
         
        <div class="clear"></div>
      </nav>
	  <br><br><br><br><br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<img style="border-radius:150px; color: black;" src="../resources/images/registro.jpg" width="100%" height="100%" >
				</div>
				<div class="col-6">
					<div class="row">
						<center><H3>Gracias por unirse</H3></center>
					</div>
					<div class="row">
						<div class="col-12 float-right">
							<form method="post" name="f1" action="../control/clientesU.php">
                                <div class="panel panel-primary">
									<br></br>
									<div class="panel-body">
										<div class="form-group">
											<label for="nombreMuseo"><h4>Nombre: </h4></label>
											<input type="text" minlength="4" required="true" name="nom" class="form-control" placeholder="Escribe el nombre del cliente"></input>
										</div>
										<div class="form-group">
											<label for="telefono"><h4>Teléfono: </h4></label>
											<input type="number" min="10" onBlur="comprobarnumero()" pattern="^[0-9]+" maxlength="10" required="true" name="num" class="form-control" placeholder="Escribe su telefono"/>
										</div>
										<div class="form-group">
											<label for="hor"><h4>Direccion </h4></label>
											<textarea type="textarea" rows="5" cols="40" class="form-control" required="true" name="dir" placeholder="Escribe la direccion del usuario"></textarea>
										</div>
										<div class="form-group">
											<label for="telefono"><h4>Correo electronico: </h4></label>
											<input type="email" required="true" name="cor" class="form-control" placeholder="Escriba su correo electronico"/>
										</div>
										<div class="form-group">
											<label for="telefono"><h4>Contraseña: </h4></label>
											<input type="password" required="true" name="pas" class="form-control" placeholder="Escriba su contraseña"/>
										</div>
										<div class="form-group">
											<label for="telefono"><h4>Confirmar contraseña: </h4></label>
											<input type="password" required="true"  onBlur="comprobarClave()" name="pas1" class="form-control" placeholder="Escriba su contraseña de nuevo"/>
										</div>
									</div>
								</div>
								<center> <input type="submit" name="Agregar" class="btn btn-primary btn-lg" Value="Registrarse" style="display:none"> </center>
								<input type="hidden" name="accion" value="Agregar">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	  <br><br><br><br><br>
	  <center>
<!-- footer -->

<!--Footer-->

<!--/.Footer-->
                
            



<!-- footer -->
  <script>
  function comprobarnumero(){
    tel = document.f1.num.value
    if(tel.length <=10 && tel.length >=8){
        
    }else{
           alert("El numero de telefono debe ser de 8 o 10 digitos")
    	   document.f1.num.value=""
    	   document.f1.Agregar.style.display="none";
	}
}
    function comprobarClave(){
    clave1 = document.f1.pas.value
    clave2 = document.f1.pas1.value
   
        if (clave1 == clave2) {
           //alert("Las dos claves son iguales...\nRealizaríamos las acciones del caso positivo")
    	   document.f1.Agregar.style.display="block";
        }else{
           alert("Las dos contraseñas no coinciden")
    	   document.f1.pas.value=""
    	   document.f1.pas1.value=""
    	   document.f1.Agregar.style.display="none";
    	}
    
}

</script>

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
                
                <li><a href="inicio.html"><span class="numero">1-</span>Iniciar sesion<span class="lineamenu"></span></a></li>
                <li><a href="formClienteU.php"><span class="numero">2-</span>Registrarse <span class="lineamenu"></span></a></li>
                
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