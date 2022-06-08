<?php
    include('conexionBD.php');//Incluimos el archivo de conexion para no tener que poner los datos en cada fichero
    
    if(isset($_POST['CnombreS'])) {//Comprobamos si esta establecido el nombre, en su caso la almacenamos
        $nombre = $connection->real_escape_string($_POST['CnombreS']); 
        $email = $connection->real_escape_string($_POST['CemailS']);
        $asunto = $connection->real_escape_string($_POST['CasuntoS']);
        $mensaje = $connection->real_escape_string($_POST['CmensajeS']);

	if($nombre && $email && $asunto && $mensaje){//Si los campos no estan vacios ejecuta la consulta
        $query = "INSERT INTO soporte (nombre, email, asunto, mensaje)
        VALUES ('$nombre', '$email', '$asunto', '$mensaje')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Consulta fallida.');
        }
        //echo "Usuario añadido correctamente"; 
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
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div id="cajaBlanca" class="col-md-7 col-lg-5">
					<div class="wrap">
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
										<ul class="list">
											<div>
												<button class="switch" id="switch">
													<span><i class="fas fa-sun"></i></span>
													<span><i class="fas fa-moon"></i></span>
												</button>
											</div>
										</ul>
										<h4 class="mb-4">Soporte añadido correctamente</h4>			
									</div>
								</div>
        						<button type="submit" ONCLICK="window.location.href= 'admin-soporte.php'" class="form-control btn rounded submit px-3">Aceptar</button>
							</div>
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
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div id="cajaBlanca" class="col-md-7 col-lg-5">
					<div class="wrap">
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
										<ul class="list">
											<div>
												<button class="switch" id="switch">
													<span><i class="fas fa-sun"></i></span>
													<span><i class="fas fa-moon"></i></span>
												</button>
											</div>
										</ul>
										<h4 class="mb-4">Los campos no pueden estar vacios</h4>			
									</div>
								</div>
        						<button type="submit" ONCLICK="window.location.href= 'admin-soporte.php'" class="form-control btn rounded submit px-3">Volveer</button>
							</div>
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
	}
	mysqli_close($connection);
}
?>