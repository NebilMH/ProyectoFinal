<?php
    error_reporting(0);//Permite ocultar los errores de php en la pagina 
    ini_set('display_errors', '1');

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
?>

</body>
</html>

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
                                                <button type="button" class="btnAtras" onclick="location.href='carrito.php'"><i class="fa-solid fa-arrow-left"></i> Cancelar</button>
                                                <h2 style="font-size:25px;">Resumen de pedido</h2>
                                                <hr>
                                                <?php /*$id = $_POST['id']; echo $id;*/?>
                                                    <section class="productos_carrito">
                                                        <table class="tabla-productos-carrito">
                                                            <thead>
                                                                <tr class="tabla">
                                                                    <td><b></b></td>
                                                                    <td><b></b></td>
                                                                    <td><b></b></td>
                                                                    <td><b></b></td>
                                                                    <td><b></b></td>
                                                                </tr>
                                                                    <?php
                                                                            function imprimeListaProductos() {//Imprimimos los datos del array de sesion con foreach en forma de tabla
                                                                                $datos = $_SESSION['datos'];
                                                                                $total = 0.00;//Inicializamos el valor del total a 0 para que vaya sumando el valor de los productos
                                                                                $contador = -1;//Inicializamos el valor del contador a -1, porque los arrays empiezan por la posicion 0
                                                                                //Esta variable contador nos servira para poder eliminar el producto que deseemos del carrito

                                                                                foreach ($datos as $producto) {//Imprimimos los datos del array de sesion uno encima de otro
                                                                                    $contador ++;

                                                                                    echo "<tr>
                                                                                            <td><img src=".$producto['imagen']." width='100px'></td>
                                                                                            <td style='font-size:25px'>".$producto['nombre_producto']."</td>
                                                                                            <td style='font-size:25px'>".$producto['precio']."€</td>
                                                                                            <td>
                                                                                                <form action='eliminarProductoCarro.php' method='POST'>
                                                                                                    <input type='hidden' name='contador' value='".$contador."'>
                                                                                                </form>
                                                                                            </td>
                                                                                            
                                                                                        </tr>";
                                                                                        
                                                                                    $total += $producto['precio'];
                                                                                }
                                                                                echo "<tr><p id='total'>Total: ".$total."€</p></tr>";
                                                                            }           
                                                                        imprimeListaProductos();
                                                                    ?>
                                                            </thead>
                                                        </table>
                                                    </section>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="wrap">
								<div class="login-wrap p-4">
									<div class="d-flex">
										<div class="w-100">
                                        <form action="compra-correcta.php" method="post" class="signin-form needs-validation">
                                            <div class="form-group" id="input1">
                                                <p>Métodos de pago <br><img style="height:25px;" src="../images/visa.png" alt=""> <img style="height:25px;" src="../images/master-card.png" alt=""> <img style="height:25px;" src="../images/american-express.png" alt=""> <img style="height:25px;" src="../images/paypal.png" alt=""><hr>
                                            </div>

                                            <div class="form-group" id="input1">
                                                <label style="color:black" for="nombre" class="form-label" id="label"><b>Nombre del titular:</b></label>
                                                <input name="nameCard" id="nombre" type="text" class="form-control" placeholder="Como aparece en la tarjeta" autofocus required maxlength="30" minlength="2">
                                            </div>
                                    
                                            <div class="form-group" id="input">
                                                <label style="color:black" for="apellido" class="form-label" id="label"><b>Número de tarjeta:</b></label>
                                                <input name="apellido" id="apellido" type="text" class="form-control" placeholder="Solo puede contener letras y espacios" required maxlength="16" minlength="16">
                                            </div>
                                    
                                            <div class="form-group" id="input">
                                                <label style="color:black" for="email" class="form-label" id="label"><b>Fecha de expiración:</b></label>
                                                <input name="email" id="email" type="text" class="form-control" placeholder="Mes/Año" required maxlength="5" minlength="5">
                                            </div>
                                    
                                            <div class="form-group" id="input">
                                                <label style="color:black" for="usuario" class="form-label" id="label"><b>Código de seguridad(CVV):</b></label>
                                                <input name="usuario" id="usuario" type="text" class="form-control" placeholder="3 dígitos" required maxlength="3" minlength="3">
                                            </div>
                                
                                            <div>
                                                <button type="submit" class="btnPago2 form-control btn rounded submit px-3"><i class='fa fa-credit-card'></i> Confirmar Pago</button><!-- Boton de confirmacion -->
                                            </div>
                                            <input type="hidden" id="inputId">
                                        </form>
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