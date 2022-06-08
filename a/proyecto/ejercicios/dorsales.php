<?php  
    //Permite ocultar los errores de php en la pagina 
    error_reporting(0); 
    ini_set('display_errors', '1');

    session_start();
    
    if(isset($_SESSION['invitado'])) {
        $invitado = $_SESSION['invitado'];

    } else if(isset($_SESSION['usuario'])) {
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];

    } else {
        header('Location: ../php/login.php');
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nabil Messaoudi Hammu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-ejercicios.css">

    <!-- Estilos Boton -->
    <script src="https://kit.fontawesome.com/9ba7b80b84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos-boton.css">

    <!-- Estilos Footer -->
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/style-footer.css">

    <style>
        .bocadillo{
            border-radius: 5px;
            background-color: red;
            color: white;
            width: 230px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2em;
            text-align: center;
            padding-top: 11px;
            margin: auto;
            text-transform: uppercase;
            padding-bottom: 3px;
            font-weight: bold;
        }
    </style>

</head>
<body>
    <!--<header>
        <div class="header">
            <div id="menu-bar" class="fa fa-bars"></div>
                <a href="#" class="logo"><img src="../images/logo2.png" alt=""> Gym Contigo </a>
            <nav class="navbar">
                <a href="../index.php">Inicio</a>
                <a href="../shop/index.html">Tienda</a>
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
                <a href="#" class="logo" style="font-weight: bold;font-size:20px;text-transform: uppercase;"><i class="fa-solid fa-dumbbell"></i> Gym Contigo</a>
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
                <form action='../php/perfil-usuario.php' method='POST' name='formulario'>
                <?php 
                        if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "Admin") {
                            echo "
                                <a href='../php/admin-usuarios.php' style='font-size:20px;background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                <a aria-label='cerrarS button' style='font-size:20px;margin-left:10px;' href='../php/cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>
                            ";
                        } else if (isset($_SESSION['invitado'])) {
                            echo "<a href='../login.php'><i class='fa fa-user'></i></a>";
                        } else {
                            echo "
                                <input type='hidden' name='id' value='".$_SESSION['id']."'>
                                <button type='submit' style='background-color:transparent'>
                                    <a style='font-size:20px;background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                </button>
                                <a aria-label='cerrarS button' style='font-size:20px;' href='../php/cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>
                            ";
                        } 
                ?>
                </form>
            </h1>
        </div>
    </header>
    
    <div class="video"> 
        <div class="content">
            <h3 class="texto">Ejercicio - Dorsales</h3>
            <p class="texto">
                El dorsal ancho (lattissimus dorsi), es un músculo grande ancho y aplanado que recubre la parte posterior 
                del tronco extendiéndose desde la región lumbar hasta el húmero. Es un músculo potente que interviene en 
                muchas acciones deportivas y frecuentemente puede ser foco de dolor.
            </p>
        </div>
        <div class="image-container">
            <div class="big-image">
                <iframe width="1000" height="510" src="https://www.youtube.com/embed/HTsfl9wzOu0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div>
        <footer id="footer" class="footer">
            <div class="container-fluid px-lg-5">
                <div class="row">
                    <div class="col-md-9 py-5">
                        <div class="row">
        
                            <div class="col-md-4 mb-md-0 mb-4">
                                <h2 class="footer-heading">About us</h2>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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
        
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Discover</h2>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-1 d-block">Protein benefits</a></li>
                                                    <li><a href="#" class="py-1 d-block">Merchant</a></li>
                                                    <li><a href="#" class="py-1 d-block">Giving back</a></li>
                                                    <li><a href="#" class="py-1 d-block">Help &amp; Support</a></li>
                                                </ul>
                                            </div>
        
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">About</h2>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-1 d-block">Business</a></li>
                                                    <li><a href="#" class="py-1 d-block">Team</a></li>
                                                    <li><a href="#" class="py-1 d-block">Careers</a></li>
                                                    <li><a href="#" class="py-1 d-block">Blog</a></li>
                                                </ul>
                                            </div>
        
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Resources</h2>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-1 d-block">Security</a></li>
                                                    <li><a href="#" class="py-1 d-block">Global</a></li>
                                                    <li><a href="#" class="py-1 d-block">Charts</a></li>
                                                    <li><a href="#" class="py-1 d-block">Privacy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
                        <h2 class="footer-heading footer-heading-white">Contact us</h2>
                        <form action="#" class="contact-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control submit px-3">Send</button>
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
    <script src="../js/main-boton.js"></script>
</body>
</html>