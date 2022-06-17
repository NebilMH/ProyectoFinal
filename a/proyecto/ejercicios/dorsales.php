<?php  
    include("../php/conexionBD.php");
    error_reporting(0);//Permite ocultar los errores de php en la pagina 
    ini_set('display_errors', '1');

    if ($connection) {
    
    session_start();//Comenzamos sesion

    if(isset($_SESSION['invitado'])) {
        $invitado = $_SESSION['invitado'];

    } else if(isset($_SESSION['id_rol'])) {//Comprobamos si la sesion usuario esta establecida, en su caso almacenamos los datos en variables
        $email = $_SESSION['email'];
        $usuario = $_SESSION['usuario'];
        $id = $_SESSION['id'];
        $id_rol = $_SESSION['id_rol'];

        if(isset($_SESSION['datos'])) {
            $carrito = $_SESSION['datos'];
            $numero = count($carrito);
        }
    } else {
        header('Location: php/login.php');//En caso de no haber ninguna sesion activa que nos redireccione al login,
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
    <link rel="icon" type="image/x-icon" href="../images/favicon3.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-ejercicios.css">

    <!-- Estilos Boton -->
    <script src="https://kit.fontawesome.com/9ba7b80b84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos-boton-ppal.css">
    <link rel="stylesheet" href="../css/estilos-boton.css">

    <!-- Estilos Footer -->
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/style-footer.css">
</head>
<body>
    <!--<header>
        <div class="header">
            <div id="menu-bar" class="fa fa-bars"></div>
                <a href="#" class="logo"><img src="../images/logo2.png" alt=""> Gym Contigo </a>
            <nav class="navbar">
                <a href="../index.php">Inicio</a>
                <a href="../shop/index.php">Tienda</a>
                <a href="#footer">Contacto</a>
                <a class="botondm">
                    <input type="checkbox" id="switch-checkbox"/>
                    <label id="switch" class="switchtxt" for="switch-checkbox">Modo Oscuro</label>
                </a>
            </nav>
            <div class="icons">
                <a href="#"><i ONCLICK="window.location.href= 'login.html'" class="fa fa-user"></i></a>
            </div>
        </div>
    </header>-->

    <div class="bocadillo">
        Ejercicios
    </div>
    <header>
        <div class="header">
            <div id="menu-bar" class="fa fa-bars"></div>
                <!--<a href="#" class="logo" style="font-weight: bold;"><img src="images/logo2.png" alt="">  -->
                <a href="#" class="logo" style="font-weight: bold;text-transform: uppercase;"><i class="fa-solid fa-dumbbell"></i> Gym Contigo</a>
            <nav class="navbar" style="text-transform: uppercase;">
                <a href="../index.php">Inicio</a>
                <a href="../shop/index.php">Tienda</a>
                <a href="#footer">Contacto</a>
                <a class="botondm">
                    <input type="checkbox" id="switch-checkbox"/>
                    <label id="switch" class="switchtxt" for="switch-checkbox">Modo Oscuro</label>
                </a>
            </nav>
            <h1>
                <!--<a href="#"><i ONCLICK="window.location.href= 'login.html'" class="fa fa-user"></i> <?php /*if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario'];}*/?></a>-->
                <form action='../php/perfil-usuario-ppal.php' method='POST' name='formulario'>
                <?php 
                        if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == "1") {
                            echo "
                                <a id='userPage' href='../php/admin-usuarios.php' style='background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                <a class='userandicon' aria-label='cerrarS button' style='margin-left:10px;' href='../php/cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>
                            ";
                        } else if (isset($_SESSION['invitado'])) {
                            echo "<a href='../php/login.php'><i class='fa fa-user'></i></a>";
                        } else {
                            echo "
                                <input type='hidden' name='id' value='".$_SESSION['id']."'>
                                <button type='submit' style='background-color:transparent'>
                                    <a id='userPage' class='userandicon' style='background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                </button>
                                <a aria-label='cerrarS button' href='../php/cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>
                            ";
                        } 
                ?>
                </form>
            </h1>
        </div>
    </header>
    
    <?php
        include("../php/conexionBD.php");
        $currentFile = basename(__FILE__);

        $query="SELECT * FROM ejercicios WHERE urlP='$currentFile'"; 
        $result = mysqli_query($connection, $query);

        $contador = 0;
        while(($contador < 1) && ($row = mysqli_fetch_array($result))){
    ?>
    
    <div class="video"> 
        <div class="content">
            <h3>Ejercicio - <?php echo $row['titulo']; ?></h3>
            <p><?php echo $row['descripcion']; ?></p>
        </div>
        <div class="image-container">
            <div class="big-image">
                <?php echo $row['urlV']; ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>

    <div>
        <footer id="footer" class="footer">
            <div class="container-fluid px-lg-5">
                <div class="row">
                    <div class="col-md-9 py-4">
                        <div class="row">
                            <div class="col-md-3 mb-md-0 mb-4">
                                <h4 class="footer-heading">Sobre nosotros</h4>
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
                                                <h4 class="footer-heading">Descubrir</h4>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-1 d-block">Beneficios de las proteinas</a></li>
                                                    <li><a href="#" class="py-1 d-block">Merchandising</a></li>
                                                    <li><a href="#" class="py-1 d-block">Devoluciones</a></li>
                                                    <li><a href="#" class="py-1 d-block">Ayuda &amp; Soporte</a></li>
                                                </ul>
                                            </div>
        
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h4 class="footer-heading">Acerca</h4>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-1 d-block">Negocio</a></li>
                                                    <li><a href="#" class="py-1 d-block">Equipo</a></li>
                                                    <li><a href="#" class="py-1 d-block">Carrera</a></li>
                                                    <li><a href="#" class="py-1 d-block">Blog</a></li>
                                                </ul>
                                            </div>
        
                                            <div class="col-md-3 mb-md-0 mb-4">
                                                <h4 class="footer-heading">Recursos</h4>
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
                        <form action="../php/soporte.php" method="post" class="contact-form">
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

	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/ejercicio.js"></script>
    <script src="../js/main-boton.js"></script>
</body>
</html>
<?php
    } else {
        header("Location: ../php/despliegue/index-instalador.php");
    }
?>