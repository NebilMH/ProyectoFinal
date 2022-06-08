<?php
    include('conexionBD.php');//Incluimos el archivo de conexion para no tener que poner los datos en cada fichero
    
    if(isset($_POST['nombre'])) {//Comprobamos si esta establecida la url, en su caso la almacenamos
        $nombre = $connection->real_escape_string($_POST['nombre']); 
        $apellido = $connection->real_escape_string($_POST['apellido']);
        $email = $connection->real_escape_string($_POST['email']);
        $usuario = $connection->real_escape_string($_POST['usuario']);
        $contraseña = $connection->real_escape_string($_POST['contraseña']);

		//Si los campos no estan vacios ejecuta la consulta, (esto se comprueba directamente en html con la validacion de bootstrap)
        $query = "INSERT INTO usuarios (nombre, apellido, email, usuario, contraseña)
        VALUES ('$nombre', '$apellido', '$email', '$usuario', '$contraseña')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Consulta fallida.');
        }
        //echo "Usuario añadido correctamente";  
    }
        mysqli_close($connection);
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
										<h4 class="mb-4">Usuario añadido correctamente</h4>			
									</div>
								</div>
        						<button type="submit" ONCLICK="window.location.href= 'admin-usuarios.php'" class="form-control btn rounded submit px-3">Aceptar</button>
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