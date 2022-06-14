<?php  
    error_reporting(0);//Permite ocultar los errores de php en la pagina 
    ini_set('display_errors', '1');

    include("conexionBD.php");

    if ($connection) {

    session_start(); //Iniciamos la sesion

    if(isset($_SESSION['invitado'])) { //Comprobamos si tenemos la session de invitado
        $invitado = $_SESSION['invitado'];

    } else if(isset($_SESSION['usuario'])) {//Comprobamos si tenemos la session de usuario
        $email = $_SESSION['email'];
        $usuario = $_SESSION['usuario'];
        $id = $_SESSION['id'];

    } else {
        header('Location: login.php');//Si no existe ninguna de las dos sesiones redirige al login
    }

    $array = $_SESSION['datos'];

    for ($i=0; $i < sizeof($_SESSION['datos']); $i++) {
        $id_usuario = $_SESSION['id'];
        $id_producto = $_SESSION['datos'][$i]['id'];
        $producto = $_SESSION['datos'][$i]['nombre_producto'];
        $precio = $_SESSION['datos'][$i]['precio'];

        $query = "INSERT INTO facturas (id_usuario, id_producto, producto, precio) 
        VALUES ('$id_usuario', '$id_producto', '$producto', '$precio')";
        $result = mysqli_query($connection, $query);
    }
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
	<link rel="stylesheet" href="../css/estilos-carrito.css">

	<!-- Estilos Darkmode -->
	<script src="https://kit.fontawesome.com/9ba7b80b84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos-boton-sl.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Estilos Footer -->
    <link rel="stylesheet" href="../css/ionicons.min.css">
	<link rel="stylesheet" href="../css/style-footer.css">

    <!-- Estilos Dark Mode -->
    <script src="https://kit.fontawesome.com/9ba7b80b84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos-boton.css">

	</head>
	<body>
    <div class="bocadillo">
        Carrito
    </div>
        <header>
            <div id="menu-bar" class="fa fa-bars"></div>
                <!--<a href="#" style="font-weight: bold;" class="logo"><img src="../images/logo2.png" alt=""> Gym Contigo</a>-->
                <a href="#" class="logo" style="font-weight: bold;"><i class="fa-solid fa-dumbbell"></i> Gym Contigo</a>
            <nav class="navbar">
                <a href="../index.php">Inicio</a>
                <a href="../shop/index.php">Tienda</a>
                <a class="botondm">
                    <input type="checkbox" id="switch-checkbox"/>
                    <label id="switch" class="switchtxt" for="switch-checkbox">Modo Oscuro</label>
                </a>
            </nav>
            <div class="icons">
                <!--<a href="#" style="text-transform: none; color:darkcyan;"><i ONCLICK="window.location.href= '../login.php'" class="fa fa-user"></i> <?php /*if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario'];}*/?></a>-->
                <form action='perfil-usuario-tienda.php' method='POST' name='formulario'>
                    <?php 
                        if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "Admin") {
                            echo "
                                <a href='#'><i id='heart' class='fa fa-heart'></i><span style='color:transparent;'>.</span></a>
                                <a class='userandicon' href='admin-usuarios.php' style='font-size:19px;background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                <a style='font-size:20px;margin-left:10px;' href='cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i><span style='color:transparent;'>.</span></a>
                            ";
                        } else if (isset($_SESSION['invitado'])) {
                            echo "<a href='login.php'><i class='fa fa-user'></i></a>";
                        } else {
                            echo "
                                <a href='#'><i id='heart' class='fa fa-heart'></i><span style='color:transparent;'>.</span></a>
                                <input type='hidden' name='id' value='".$_SESSION['id']."'>
                                <button type='submit' style='background-color:transparent'>
                                    <a class='userandicon' style='font-size:19px;background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                </button>
                                <a style='font-size:20px;' href='cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i><span style='color:transparent;'>.</span></a>
                            ";
                        }
                    ?>
                </form>
            </div>
        </header>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="wrap">
								<div class="login-wrap p-4">
									<div class="d-flex">
										<div class="w-100">
                                            <h2>La compra se ha realizado correctamente, gracias por confiar en nosotros <i class="fa-solid fa-hand-wave"></i></h2>
                                            <p>¡Vuelva pronto!</p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="../js/main-boton.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../shop/js/index.js"></script>
	</body>
</html>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>