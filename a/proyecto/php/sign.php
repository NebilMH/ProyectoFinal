<?php
	error_reporting(0);//Permite ocultar los errores de php en la pagina 
    ini_set('display_errors', '1');
	session_start(); //Iniciamos sesion y la destruimos para que no haya ninguna sesion 
					//activa a la hora de registrase, ya que el codigo de verificacion lo tenemos en session
	session_destroy();
?>

<!doctype html>
<html lang="en">
	<head>
	<title>Nabil Messaoudi Hammu</title>
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
	<body style="line-height: 1;">
		<section class="ftco-section" style="padding: 0.8em 0;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-5">
						<div class="wrap">
							<div class="img" style="height: 170px;background-image: url(../images/fondo.jpg);"></div>
								<div class="login-wrap p-4 p-md-5">
									<div class="d-flex">
										<div class="w-100">
											<h3 class="mb-3">Registro</h3>			
										</div>
									</div>
		
		<!-- Formulario -->
		<form action="guardarUsuario.php" method="post" class="signin-form needs-validation" novalidate>
			<div class="form-group" id="input1">
				<label style="color:black" for="nombre" class="form-label" id="label"><b>Nombre:</b></label>
				<input name="nombre" id="nombre" type="text" class="form-control" placeholder="Solo puede contener letras" required maxlength="30" minlength="2" pattern="^[A-Za-z]+$">
				<div class="valid-feedback">Correcto</div>
				<div class="invalid-feedback" small>Nombre incorrecto</div>
			</div>
	
			<div class="form-group" id="input">
				<label style="color:black" for="apellido" class="form-label" id="label"><b>Apellido:</b></label>
				<input name="apellido" id="apellido" type="text" class="form-control" placeholder="Solo puede contener letras y espacios" required maxlength="30" minlength="2" pattern="^[A-Za-z ]+$">
				<div class="valid-feedback">Correcto</div>
				<div class="invalid-feedback">Apellido incorrecto</div>
			</div>
	
			<div class="form-group" id="input">
				<label style="color:black" for="email" class="form-label" id="label"><b>Email:</b></label>
				<input name="email" id="email" type="text" class="form-control" placeholder="ejemplo@gmail.com" required maxlength="30" minlength="5" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$">
				<div class="valid-feedback">Correcto</div>
				<div class="invalid-feedback">Email incorrecto</div>
			</div>
	
			<div class="form-group" id="input">
				<label style="color:black" for="usuario" class="form-label" id="label"><b>Usuario:</b></label>
				<input name="usuario" id="usuario" type="text" class="form-control" placeholder="Debe contener letras y numeros" required maxlength="15" minlength="5" pattern="^(?=.*?\d)(?=.*?[a-zA-Z])[a-zA-Z\d]+$">
				<div class="valid-feedback">Correcto</div>
				<div class="invalid-feedback">Usuario incorrecto</div>
			</div>
	
			<div class="form-group" id="input">
				<label style="color:black" for="password-field" class="form-label" id="label"><b>Contraseña:</b></label>
				<input name="contraseña" id="password-field" type="password" class="form-control" placeholder="Puede incluir cualquier caracter, minimo 8" required maxlength="40" minlength="8">
				<span toggle="#password-field" class="fa fa-eye toggle-password" id="ojo"></span>
				<div class="valid-feedback">Correcto</div>
				<div class="invalid-feedback">Contraseña incorrecta</div>
			</div>
	
			<div >
				<button  style="font-size: 1.1rem;font-weight: bold;color:black;background-color:greenyellow;" type="submit" class="form-control btn rounded submit px-3">Registrarse</button><!-- Boton de confirmacion -->
			</div>
			<input type="hidden" id="inputId">
		</form>
		<p class="text-center" style="margin-top:10px;"><span style="color: black;">eres miembro?</span>  <a data-toggle="tab" style="color:forestgreen;font-weight:bold;font-size:19px;" href="#" ONCLICK="window.location.href= 'login.php'">Inicia Sesion</a></p>
			</div>
			</div>
					</div>
				</div>
			</div>
		</section>
	
		<!-- Script para evitar que se envie el formulario si los datos son incorrectos -->
		<script>
			(function () {
			'use strict'
	
			var forms = document.querySelectorAll('.needs-validation')
	
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
				form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
					}
	
					form.classList.add('was-validated')
				}, false)
				})
			})()
		</script>

	<script src="../login/js/jquery.min.js"></script>
	<script src="../login/js/bootstrap.min.js"></script>
	<script src="../login/js/main.js"></script>
	</body>
</html>