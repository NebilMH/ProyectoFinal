<?php
     // Archivo al que le daremos permisos
    $archivo = "/var/www/html/ProyectoFinal/a/proyecto/php/despliegue/instalador.sh";
     // Asignamos todos los permisos al archivo
    chmod($archivo, 0777);
?>
<!doctype html>
<html lang="en">
	<head>
	<title>Nabil Messaoudi Hammu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../login/css/style.css">
	<link rel="stylesheet" href="../../css/estilosLogin.css">

	<!-- Estilos Darkmode -->
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos-boton-sl.css">

	</head>
	<body>
	<section class="ftco-section" style="padding: 3.5em 0;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(../../images/fondo3.png);"></div>
						<div class="login-wrap p-4 p-md-5">
			<div class="d-flex">
			<div class="w-100">
			<h3 class="mb-4">Instalador</h3>	
				<p>Dar permisos al archivo instalador.sh: sudo chmod +x /var/www/html/ProyectoFinal/a/proyecto/php/despliegue/instalador.sh</p>		
			</div>
			</div>
                <form action="instalador.php" method="post" class="signin-form">
                    <div class="form-group mt-6">
                        <label for="usuario" style="color:black;">Base de Datos:</label>
                        <input name="usuario" id="usuario" type="text" value="proyecto" class="form-control" readonly>
                    </div>

                    <div class="form-group mt-5">
                        <label for="email" style="color:black;">Usuario Base de Datos:</label>
                        <input name="email" id="email" type="text" value="debianDB" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="password-field" style="color:black;">Contraseña Base de Datos:</label>
                        <input id="password-field" name="contrasenia" type="text" value="debianDB" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <button  style="font-size: 1.1rem;font-weight: bold;color:black;background-color:yellow;" type="submit" class="form-control btn rounded submit px-3">Instalar</button>
                    </div>

                </form>
            </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../../login/js/jquery.min.js"></script>
	<script src="../../login/js/bootstrap.min.js"></script>
	<script src="../../login/js/main.js"></script>
	<script src="../../js/main-boton.js"></script>
	</body>
</html>
