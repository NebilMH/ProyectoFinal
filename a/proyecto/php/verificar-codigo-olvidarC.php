<?php
	include('conexionBD.php');//Incluimos el archivo de conexion para no tener que poner los datos en cada fichero

	session_start();//Iniciamos la sesion

	$codigo = $_SESSION["codigoPass"];//Almacenamos la sesion del codigo de verificacion
	$email = $connection->real_escape_string($_POST["email"]);//Almacenamos el correo electronico del usuario

    $query="SELECT * FROM usuarios WHERE email='$email'"; 

    $resultado = mysqli_query($connection, $query) or die ('Error en el query database');

    if(!$resultado) {
        die('Query Failed'. mysqli_error($connection));
    }

    //Valida que la consulta esté bien hecha
    if($resultado){
        //Ahora valida que la consuta haya devuelto registros
        if( mysqli_num_rows( $resultado ) > 0){
            //Mientras mysqli_fetch_array devuelva algo, lo agregamos a una variable temporal
            while($row = mysqli_fetch_array($resultado)){
            //Ahora $row tiene la primera fila de la consulta, pongamos que tienes
            //un campo en tu DB llamado NOMBRE, así accederías
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
				<h3 class="mb-4">Verificacion de Registro</h3>			
			</div>
		</div>
		<form action="comprobar-codigo-olvidarC.php" method="post" class="signin-form">
			<div class="form-group mt-2">
				<input name="codigo1" type="text" class="form-control" placeholder="Código de verificación" required>
			</div>
				<input type="hidden" id="email" name="email" value="<?php echo $email;?>">
				<input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>">
			<div class="form-group">
				<button type="submit" class="form-control btn rounded submit px-3">Verificar</button>
			</div>
		</form>
			<p class="text-center"><a data-toggle="tab" href="#signup" ONCLICK="window.location.href= 'index.php'">Volver a inicio</a></p>
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
		}
	}
?>