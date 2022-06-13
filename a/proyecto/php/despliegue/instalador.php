<?php
    $bd = $_POST['bd'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $connection = mysqli_connect(
        'localhost', $usuario, $contrasenia, $bd
    );

    $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$bd'";
	$result = mysqli_query($connection, $query);

	if ($result) {
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
	<section class="ftco-section" style="padding: 3.2em 0;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(../../images/fondo3.png);"></div>
						<div class="login-wrap p-4 p-md-5">
			<div class="d-flex">
			<div class="w-100">
			<h3 class="mb-4">Instalación fallida!</h3>	
				<p>La base de datos ya existe</p>
			</div>
			</div>         
                <div class="form-group">
                    <a href="index-instalador.php"><button style="font-size: 1.1rem;font-weight: bold;color:black;background-color:yellow;" type="button" class="form-control btn rounded submit px-3">Reintentar</button></a>
                </div>
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

<?php
	} else {
?>
    <html>
    <head>
    </head>
    <body onLoad=cargar_pagina()>
    <script language=Javascript>
        function cargar_pagina(){
            formulario.action='instalacion-correcta.php';
            formulario.submit();
        }
    </script>
    <form method="POST" name="formulario">
		<input type="hidden" name="nombre" value="<?php echo $bd;?>">
		<input type="hidden" name="apellido" value="<?php echo $usuario;?>">
		<input type="hidden" name="email" value="<?php echo $contrasenia;?>">
    </form>
    </body>
    </html>
<?php
}
?>
