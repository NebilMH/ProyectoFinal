<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {

    session_start();

	if (isset($_SESSION["id"])) {
		$id = $_SESSION["id"];

    $query="SELECT * FROM usuarios WHERE id='$id'"; 

    $resultado = mysqli_query($connection, $query) or die ('Error en el query database');

    if(!$resultado) {
        die('Query Failed'. mysqli_error($connection));
    }

    //Valida que la consulta esté bien hecha
    if($resultado){
        //Ahora valida que la consuta haya traido registros
        if( mysqli_num_rows( $resultado ) > 0){
            //Mientras mysqli_fetch_array devuelva algo, lo agregamos a una variable temporal
            while($row = mysqli_fetch_array( $resultado ) ){
        
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
				<h3 class="mb-4">Editar datos</h3>			
			</div>
		</div>
		<form style="line-height: 1;" action="editarUsuario-ppal.php" method="post" class="signin-form">
			<div class="form-group mt-2">
                <label for="nombrelbl">Nombre:</label>
				<input id="nombrelbl" name="Enombre" type="text" class="form-control" value="<?php echo $row['nombre'];?>">
			</div>

            <div class="form-group mt-2">
            <label for="apellidolbl">Apellido:</label>
				<input id="apellidolbl" name="Eapellido" type="text" class="form-control" value="<?php echo $row['apellido'];?>">
			</div>

            <div class="form-group mt-2">
            <label for="emaillbl">Email:</label>
				<input id="emaillbl" name="Eemail" type="text" class="form-control" value="<?php echo $row['email'];?>">
			</div>

            <div class="form-group mt-2">
            <label for="usuariolbl">Usuario:</label>
				<input id="usuariolbl" name="Eusuario" type="text" class="form-control" value="<?php echo $row['usuario'];?>">
			</div>

            <div class="form-group mt-2">
            <label for="contrasenialbl">Contraseña:</label>
				<input id="contrasenialbl" name="Econtrasenia" type="text" placeholder="Introduzca su contrasenia" class="form-control">
			</div>

			<!--<input type="hidden" name="id" value="<?php /*echo $row['id'];*/?>">
            <input type="text" name="nombre" value="<?php /*echo $row['nombre'];*/?>">
            <input type="text" name="apellido" value="<?php /*echo $row['apellido'];*/?>">
            <input type="text" name="email" value="<?php /*echo $row['email'];*/?>">
            <input type="text" name="usuario" value="<?php /*echo $row['usuario'];*/?>">
            <input type="text" name="contrasenia" value="<?php /*echo $row['contrasenia'];*/?>">-->

			<div class="form-group">
				<button type="submit" class="form-control btn btn-primary rounded submit px-3">Actualizar datos</button>
			</div>
		</form>
			<p class="text-center"><a data-toggle="tab" href="#signup" ONCLICK="window.location.href= '../index.php'">Volver a inicio</a></p>
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
        mysqli_close( $connection );
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
                                            <h4 class="mb-4">No tengo id</h4>			
                                        </div>
                                    </div>
                                    <button type="submit" ONCLICK="window.location.href= 'login.php'" class="form-control btn rounded submit px-3">Volver a intentar</button>
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
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>