<?php  
    //Permite ocultar los errores de php en la pagina 
    error_reporting(0); 
    ini_set('display_errors', '1');

    session_start();//Comenzamos sesion
    
    if(isset($_SESSION['invitado'])) { //Comprobamos si la sesion invitado esta establecida, en su caso la almacenamos en una variable
        $invitado = $_SESSION['invitado'];

    } else if(isset($_SESSION['usuario'])) { //Comprobamos si la sesion usuario esta establecida, en su caso almacenamos los datos en variables
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];

    } else {
        header('Location: php/login.php'); //En caso de no haber ninguna sesion activa que nos redireccione al login,
                                        //Esto hace que el usuario no pueda entrar a la pagina sin haberse registrado e iniciado sesion primero
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title>Nabil Messaoudi Hammu</title>-->
    <title>Gym Contigo </title>
    <link rel="icon" type="image/x-icon" href="images/favicon3.png">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Estilos Carousel-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
	<link rel="stylesheet" href="css/style-carousel.css">
    
    <!-- Estilos -->
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/responsive-principal.css">

    <!-- Estilos boton modo oscuro -->
    <script src="https://kit.fontawesome.com/9ba7b80b84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos-boton-ppal.css">

    <!-- Estilos Footer -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/style-footer.css">
</head>
<body>
    <!-- Barra de navegacion 
    <nav id="nav" class="navbar container fixed-top">
        <a href="#" class="logo">
            <img id="logo" src="images/logo2.png"><span id="titulo">Gym Contigo</span> 
        </a>
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="ri-menu-line"></i></label>
                <div class="menu">
                    <ul class="list">
                        <li class="lista"><a href="shop/index.html">Tienda</a></li>
                        <li class="lista"><a href="#">Acerca</a></li>
                        <li class="lista"><a href="#footer">Contacto</a></li>
                        <li><a ONCLICK="window.location.href= 'sign.html'" class="button_slide slide_left">Registrarse</a></li>
                        <li><a ONCLICK="window.location.href= 'login.html'" class="button_slide slide_left">Iniciar Sesión</a></li>
                        <li class="lista fa fa-user"><a href="#" id="perfil"></a></span>
                    </ul>
                </div>
    </nav>-->
    <div class="bocadillo">
        Pagina principal
    </div>
    <header>
        <div class="header">
            <div id="menu-bar" class="fa fa-bars"></div>
                <!--<a href="#" class="logo" style="font-weight: bold;"><img src="images/logo2.png" alt="">  -->
                <a href="#" id="logo" class="logo" style="font-weight: bold;text-transform: uppercase;"><i class="fa-solid fa-dumbbell"></i> Gym Contigo</a>
            <nav id="navbar" class="navbar" style="text-transform: uppercase;">
                <a href="shop/index.php">Tienda</a>
                <a href="#footer">Contacto</a>
                <a class="botondm">
                    <input type="checkbox" id="switch-checkbox"/>
                    <label id="switch" style="font-weight: bold;" class="switchtxt" for="switch-checkbox">Modo Oscuro</label>
                </a>
            </nav>
            <h1>
                <!--<a href="#"><i ONCLICK="window.location.href= 'login.html'" class="fa fa-user"></i> <?php /*if(isset($_SESSION['usuario'])){ echo $_SESSION['email'];}*/?></a>-->
                <form action='php/perfil-usuario-ppal.php' method='POST' name='formulario'>
                    <?php 
                            if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "Admin") { //Si la sesion es de administrador, al hacer click en el nombre de usuario nos llevara a la pagina de administrador, tambien aparece el boron de cerrar sesion
                                echo "
                                    <a id='usuarioPpal' href='php/admin-usuarios.php' style='background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                    <a id='usuarioPpalS' aria-label='cerrarS button' style='margin-left:10px;' href='php/cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>
                                ";
                            } else if (isset($_SESSION['invitado'])) { //Si la sesion es de invitado, se ocultaran botones, como carrito, favoritos y cerrar sesion, y solo se muestra el de iniciar sesion
                                echo "<a href='php/login.php'><i class='fa fa-user'></i></a>";
                            } else { //Si la sesion no es ni de administrador ni de invitado, es de usuario, por lo que al pulsar en su usuario lo llevara a una pagina para editar sus datos, tambien aparece el boron de cerrar sesion
                                    //Al perfil del usuario le pasamos la id para que pueda hacer la consulta a la base de datos mas facil
                                echo "
                                    <input type='hidden' name='id' value='".$_SESSION['id']."'>
                                    <button type='submit' style='background-color:transparent'>
                                        <a id='usuarioPpal' style='background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                    </button>
                                    <a id='usuarioPpalS' aria-label='cerrarS button' href='php/cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>
                                ";
                            } 
                    ?>
                </form>
            </h1>
        </div>
    </header>

    <div class="main_">
        <!--<div id="buttonC">
            <div id="playC" class="playC">
                <i id="play" class="fas fa-play"></i>
            </div>
            <div id="stopC" class="stopC">
                <i id="stop" class="fas fa-stop"></i>
            </div>
        </div>-->
        
        <section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                    <a href="shop/index.php"><h3 id="productosppal">VISITA NUESTRA TIENDA <i class="fa-solid fa-basket-shopping"></i></h3></a>
						<div id="myCarousel" class="featured-carousel owl-carousel owl-theme">
                            <?php
                                include("php/conexionBD.php");
                                $query="SELECT * FROM productos ORDER BY id DESC LIMIT 7"; 
                                $result = mysqli_query($connection, $query);
                                
                                while($row = mysqli_fetch_array($result)){
                            ?>
                                <div class="item">
                                    <div class="work">
                                        <div class="img d-flex align-items-center justify-content-center rounded"><a href="shop/index.php"><img id="imagen" src="images/productos/<?php echo $row['imagen'];?>" alt="imagen1"></a></div>
                                    </div>
                                </div>
                            <?php
                                } 
                            ?>
						</div>
					</div>
				</div>
			</div>
		</section>

        <section class="">
			<div class="">
				<div class="row">
                    <div class="col-md-12">
                        <div class="featured-carousel owl-carousel">
                            <div class="item">
                                <div class="work">
                                        <div class="" style="background-image: url(images/banner2.jpg)"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <p class="texto2">¿No tienes tiempo para ir al gimnasio? PRUEBA 
            NUESTROS EXCELENTES EJERCICIOS EN CASA PARA QUE PUEDAS
            PONERTE EN FORMA SIN MOVER UN SOLO PIE</p>
        <div class="cards" id="show-ejercicios"></div>
    </div> 
    
    <div>
        <footer id="footer" class="footer">
            <div class="container-fluid px-lg-5">
                <div class="row">
                    <div class="col-md-9 py-5">
                        <div class="row">
                            <div class="col-md-3 mb-md-0 mb-4">
                                <h2 class="footer-heading">Sobre nosotros</h2>
                                <p>Quien diga que el dinero no compra la felicidad no sabe lo triste que es la pobreza.</p>
                                <ul class="ftco-footer-social p-0">
                                    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="ion-logo-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="ion-logo-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
                                </ul>
                            </div>
        
                            <div class="col-md-8">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-md-5 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Descubrir</h2>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-1 d-block">Beneficios de las proteinas</a></li>
                                                    <li><a href="#" class="py-1 d-block">Merchandising</a></li>
                                                    <li><a href="#" class="py-1 d-block">Devoluciones</a></li>
                                                    <li><a href="#" class="py-1 d-block">Ayuda &amp; Soporte</a></li>
                                                </ul>
                                            </div>
        
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Acerca</h2>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-1 d-block">Negocio</a></li>
                                                    <li><a href="#" class="py-1 d-block">Equipo</a></li>
                                                    <li><a href="#" class="py-1 d-block">Carrera</a></li>
                                                    <li><a href="#" class="py-1 d-block">Blog</a></li>
                                                </ul>
                                            </div>
        
                                            <div class="col-md-3 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Recursos</h2>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-1 d-block">Seguridad</a></li>
                                                    <li><a href="#" class="py-1 d-block">Global</a></li>
                                                    <li><a href="#" class="py-1 d-block">Gráficos</a></li>
                                                    <li><a href="#" class="py-1 d-block">Privacidad</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
                        <h1 class="footer-heading footer-heading-white" id="contactanos">Contactanos</h1>
                        <form action="php/soporte.php" method="post" class="contact-form">
                            <div class="form-group">
                                <label for="labelInput" style="color:black;">Nombre:</label>
                                <input id="labelInput" type="text" name="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="labelInput1" style="color:black;">Email:</label>
                                <input id="labelInput1" type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="labelInput2" style="color:black;">Asunto:</label>
                                <input id="labelInput2" type="text" name="asunto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="labelInput3" style="color:black;">Mensaje:</label>
                                <textarea id="labelInput3" name="mensaje" id="" cols="30" rows="3" maxlength="100" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" style="font-weight: bold;color:black;" class="form-control btn submit px-3">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </div>

	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/carousel-js/owl.carousel.min.js"></script>
    <script src="js/carousel-js/main.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main-boton.js"></script>
    <script src="js/principal.js"></script>
    <script src="shop/js/index.js"></script>
</body>
</html>