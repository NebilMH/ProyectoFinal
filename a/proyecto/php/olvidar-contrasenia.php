<?php
include("conexionBD.php");

error_reporting(0);
ini_set('display_errors', '1');

if ($connection) {
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
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(../images/fondo.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			<div class="d-flex">
			<div class="w-100">
				<h3 class="mb-4">Olvidaste tu contraseña</h3>			
			</div>
		</div>
		<form action="comprobar-correo-olvidarC.php" method="post" class="signin-form">
			<div class="form-group mt-2">
                <h4>Introduce tu correo electrónico</h4>
				<input name="email" type="text" class="form-control" placeholder="Email" required>
			</div>

			<div class="form-group">
				<button type="submit" class="form-control btn rounded submit px-3">Verificar</button>
			</div>
                    </form>
                        <p class="text-center"><a data-toggle="tab" href="" ONCLICK="window.location.href= '../index.php'">Volver a inicio</a></p>
                    </div>
                    </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../login/js/jquery.min.js"></script>
	<script src="../login/js/bootstrap.min.js"></script>
	<script src="../login/js/main.js"></script>
	<script src="../js/main-boton.js"></script>
	</body>
</html>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>