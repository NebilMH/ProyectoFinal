<?php
    include("conexionBD.php");
		
	error_reporting(0);
    ini_set('display_errors', '1');
	
	if ($connection) {
    
    if(isset($_POST['Cnombre'])) {//Comprobamos si esta establecida la url, en su caso la almacenamos
        $id_rol = $connection->real_escape_string($_POST['Cid_rol']);
		$nombre = $connection->real_escape_string($_POST['Cnombre']); 
        $apellido = $connection->real_escape_string($_POST['Capellido']);
        $email = $connection->real_escape_string($_POST['Cemail']);
        $usuario = $connection->real_escape_string($_POST['Cusuario']);
        $contrasenia = $connection->real_escape_string($_POST['Ccontrasenia']);
		$hash = password_hash($contrasenia, PASSWORD_BCRYPT);

	if($id_rol && $nombre && $apellido && $email && $usuario && $contrasenia){//Si los campos no estan vacios ejecuta la consulta
        $query = "INSERT INTO usuarios (id_rol, nombre, apellido, email, usuario, contrasenia)
        VALUES ('$id_rol', '$nombre', '$apellido', '$email', '$usuario', '$hash')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Consulta fallida.');
        }
        //echo "Usuario añadido correctamente"; 
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
				<div id="cajaBlanca" class="col-md-7 col-lg-5">
					<div class="wrap">
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
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

<?php
	} else {
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
				<div id="cajaBlanca" class="col-md-7 col-lg-5">
					<div class="wrap">
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
										<h4 class="mb-4">Los campos no pueden estar vacios</h4>			
									</div>
								</div>
        						<button type="submit" ONCLICK="window.location.href= 'admin-usuarios.php'" class="form-control btn rounded submit px-3">Volver</button>
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
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>
