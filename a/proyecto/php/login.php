<?php
	error_reporting(0);//Permite ocultar los errores de php en la pagina 
    ini_set('display_errors', '1');
	session_start(); //Iniciamos sesion y la destruimos para que no haya ninguna sesion 
					//activa a la hora de registrase o inciar sesion, ya que el codigo de verificacion lo tenemos en session
	session_destroy();
?>

<!doctype html>
<html lang="en">
	<head>
	<!--<title>Nabil Messaoudi Hammu</title>-->
	<title>Gym Contigo</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon3.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../login/css/style.css">
	<link rel="stylesheet" href="../css/estilosLogin.css">

	<!-- Estilos Darkmode -->
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos-boton-sl.css">

	</head>
	<body>
	<section class="ftco-section" style="padding: 1em 0;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="height:170px;background-image: url(../images/fondo.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			<div class="d-flex">
			<div class="w-100">
			<h3 class="mb-4">Inicio de Sesión</h3>	
					
			</div>
			</div>
		<form action="comprobarLogin.php" method="post" class="signin-form">
			<div class="form-group mt-5">
				<label for="email" style="color:black;font-weight:bold;">Email:</label>
				<input name="email" id="email" type="text" class="form-control" autofocus required>
			</div>

			<div class="form-group">
				<label for="password-field" style="color:black;font-weight:bold;">contrasenia:</label>
				<input id="password-field" name="contrasenia" type="password" class="form-control" required>
				<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
			</div>

			<div class="form-group">
				<button  style="font-size: 1.1rem;font-weight: bold;color:black;background-color:greenyellow;" type="submit" class="form-control btn rounded submit px-3">Iniciar Sesión</button>
			</div>

			<div class="form-group d-md-flex">
				<div class="w-100 text-md-right">
					<a href="olvidar-contrasenia.php" style="color:black;">Olvidé mi contrasenia</a>
				</div>
			</div>
		</form>

		<form action="comprobarLogin.php" method="post" class="signin-form">
			<input name="invitado" type="hidden" class="form-control" value="invitado">

			<div class="form-group">
				<button id="botonGuest" style="font-size: 1.1rem;font-weight: bold;color:black;" type="submit" class="form-control btn rounded submit px-3">Entrar como invitado</button>
			</div>
		</form>
			<p class="text-center" ><span style="color: black;">no eres miembro?</span>  <a data-toggle="tab" style="color:forestgreen;font-weight:bold;font-size:19px;" href="#signup" ONCLICK="window.location.href= 'sign.php'">Registrar</a></p>
		</div>
		</div>
				</div>
			</div>
		</div>
	</section>

	<script src="../login/js/jquery.min.js"></script>
	<script src="../login/js/bootstrap.min.js"></script>
	<script src="../login/js/main.js"></script>
	</body>
</html>