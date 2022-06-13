<?php  
    error_reporting(0);//Permite ocultar los errores de php en la pagina 
    ini_set('display_errors', '1');
    session_start();//Comenzamos sesion

    if(isset($_SESSION['invitado'])) {
        $invitado = $_SESSION['invitado'];

    } else if(isset($_SESSION['usuario'])) {//Comprobamos si la sesion usuario esta establecida, en su caso almacenamos los datos en variables
        $email = $_SESSION['email'];
        $usuario = $_SESSION['usuario'];
        $id = $_SESSION['id'];
        $carrito = $_SESSION['datos'];
        $numero = count($carrito);

    } else {
        header('Location: ../php/login.php');//En caso de no haber ninguna sesion activa que nos redireccione al login,
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

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilos-tienda.css">

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
            Tienda
        </div>
        <header>
            <div id="menu-bar" class="fa fa-bars"></div>
                <!--<a href="#" style="font-weight: bold;" class="logo"><img src="../images/logo2.png" alt=""> Gym Contigo</a>-->
                <a href="#" class="logo" style="font-weight: bold;"><i class="fa-solid fa-dumbbell"></i> Gym Contigo</a>
            <nav class="navbar">
                <a href="../index.php">Inicio</a>
                <a href="#fearured">Novedades</a>
                <a href="#product">Destacados</a>
                <a href="#packs">Packs</a>
                <a href="#shakers">Shakers</a>
                <a href="#barritas">Barritas</a>
                <a href="#footer">Contacto</a>
                <a class="botondm">
                    <input type="checkbox" id="switch-checkbox"/>
                    <label id="switch" class="switchtxt" for="switch-checkbox">Modo Oscuro</label>
                </a>
            </nav>
            <div class="icons">
                <!--<a href="#" style="text-transform: none; color:darkcyan;"><i ONCLICK="window.location.href= '../php/login.php'" class="fa fa-user"></i> <?php if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario'];}?></a>-->
                <form action='../php/perfil-usuario-tienda.php' method='POST' name='formulario'>
                <?php 
                        if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "Admin") {//Si la sesion es de administrador, al hacer click en el nombre de usuario nos llevara a la pagina de administrador, tambien aparece el boron de cerrar sesion
                            echo "
                                <a href='#'><i id='heart' class='fa fa-heart'></i><span style='color:transparent'>.</span></a>
                                <a href='../php/carrito.php'><i id='cart' class='fa fa-shopping-cart'></i><span style='color:transparent'>.</span>$numero</a>
                                <a class='userandicon' href='../php/admin-usuarios.php' style='font-size:18px;background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."<span style='color:transparent'>.</span></a>
                                <a style='font-size:20px;margin-left:10px;' href='../php/cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i><span style='color:transparent'>.</span></a>
                            ";
                        } else if (isset($_SESSION['invitado'])) {//Si la sesion es de invitado, se ocultaran botones, como carrito, favoritos y cerrar sesion, y solo se muestra el de iniciar sesion
                            echo "<a href='../php/login.php'><i class='fa fa-user'></i></a>";
                        } else {//Si la sesion no es ni de administrador ni de invitado, es de usuario, por lo que al pulsar en su usuario lo llevara a una pagina para editar sus datos, tambien aparece el boron de cerrar sesion
                            //Al perfil del usuario le pasamos la id para que pueda hacer la consulta a la base de datos mas facil
                            echo "
                                <a href='#'><i id='heart' class='fa fa-heart'></i><span style='color:transparent'>.</span></a>
                                <a href='../php/carrito.php'><i id='cart' class='fa fa-shopping-cart'></i><span style='color:transparent'>.</span>$numero</a>
                                <input type='hidden' name='id' value='".$_SESSION['id']."'>
                                <button type='submit' style='background-color:transparent'>
                                    <a class='userandicon' style='background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."<span style='color:transparent'>.</span></a>
                                </button>
                                <a style='font-size:20px;' href='../php/cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i><span style='color:transparent'>.</span></a>
                            ";
                        }
                    ?>
                </form>
            </div>
        </header>
        
        <!--Slider ---------------------------------------------------------------------------------------->

        <section class="home">
            <?php
                include("../php/conexionBD.php");
                $query="SELECT * FROM productos ORDER BY id DESC LIMIT 5"; 
                $result = mysqli_query($connection, $query);
                
                $contador = 0;
                while(($contador < 1) && ($row = mysqli_fetch_array($result))){
            ?>
                <form class="box" action="../php/carrito.php" method="post">
                    <div class="slide-container active">
                        <div class="slide">
                            <div class="content">
                                <span><?php echo $row['seccion'];?></span>
                                <h3><?php echo $row['nombre_producto'];?></h3>
                                <p><?php echo $row['descripcion'];?></p>
                            </div>
                            <div class="image">
                                <img alt="Imagen1" src="../images/productos/<?php echo $row['imagen'];?>" class="protein">
                            </div>
                        </div>
                    </div>
                </form>
            <?php
                $contador = $contador + 1;
            } 
            while($row = mysqli_fetch_array($result)){
                ?>
                    <form class="box" action="../php/carrito.php" method="post">
                        <div class="slide-container">
                            <div class="slide">
                                <div class="content">
                                    <span><?php echo $row['seccion'];?></span>
                                    <h3><?php echo $row['nombre_producto'];?></h3>
                                    <p><?php echo $row['descripcion'];?></p>
                                </div>
                                <div class="image">
                                    <img alt="Imagen2" src="../images/productos/<?php echo $row['imagen'];?>" class="protein">
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                    $contador = $contador + 1;
                } 
            ?>
                <div id="prev" class="fa fa-angle-left" onclick="prev();"></div>
            <div id="next" class="fa fa-angle-right" onclick="next();"></div>
        </section>

        <?php
            /*if(isset($_SESSION['invitado'])) {
                echo '';

            } else if(isset($_SESSION['usuario'])) {
                echo "<a href='#' class='btn'>Agregar al carrito</a>";
            }*/
        ?>
        
        <!--Ultimos productos ---------------------------------------------------------------------------------------->
        
        <section class="product" id="fearured">
            <h1 class="heading">Nuevos <span>Productos</span></h1>
            <div class="box-container" id='mostrar-producto-tienda-new'>
            <?php
            include("../php/conexionBD.php");
            $query="SELECT * FROM productos WHERE seccion='nuevos'"; 
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
            ?>
                <form class="box" action="../php/carrito.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"><br>
                    <input type="hidden" name="imagen" value="../images/productos/<?php echo $row['imagen'] ?>"><br>
                    <input type="hidden" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?>"><br>
                    <input type="hidden" name="precio" value="<?php echo $row['precio'] ?>"><br>
                    <input type="hidden" name="accion" value="registroDatos">

                    <div class="icons">
                        <?php
                            if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == "1") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';

                            } else if(isset($_SESSION['usuario']) && $_SESSION['id_rol'] == "2") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';
                            } else {
                                echo '';
                            }
                        ?>
                    </div>

                    <div class="content">
                        <img src="../images/productos/<?php echo $row['imagen'] ?>" alt="">
                        <h3><?php echo $row['nombre_producto'] ?></h3>
                        <div class="price"><?php echo $row['precio'] ?> <span>$90</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </form>
            <?php
                } 
            ?>
            </div>
        </section>
        
        <section class="product" id="product">
            <h1 class="heading">Productos <span>Destacados</span></h1>
            <div class="box-container" id="mostrar-producto-tienda-last">
            <?php
            include("../php/conexionBD.php");
            $query="SELECT * FROM productos WHERE seccion='ultimos'"; 
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
            ?>
                <form class="box" action="../php/carrito.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"><br>
                    <input type="hidden" name="imagen" value="../images/productos/<?php echo $row['imagen'] ?>"><br>
                    <input type="hidden" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?>"><br>
                    <input type="hidden" name="precio" value="<?php echo $row['precio'] ?>"><br>
                    <input type="hidden" name="accion" value="registroDatos">

                    <div class="icons">
                        <?php
                            if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == "1") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';

                            } else if(isset($_SESSION['usuario']) && $_SESSION['id_rol'] == "2") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';
                            } else {
                                echo '';
                            }
                        ?>
                    </div>

                    <div class="content">
                        <img src="../images/productos/<?php echo $row['imagen'] ?>" alt="">
                        <h3><?php echo $row['nombre_producto'] ?></h3>
                        <div class="price"><?php echo $row['precio'] ?> <span>$90</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </form>
            <?php
                } 
            ?>
            </div>
        </section>

        <section class="product" id="packs">
            <h1 class="heading">Packs de <span>Productos</span></h1>
            <div class="box-container" id="mostrar-producto-tienda-packs">
            <?php
            include("../php/conexionBD.php");
            $query="SELECT * FROM productos WHERE seccion='packs'"; 
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
            ?>
                <form class="box" action="../php/carrito.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"><br>
                    <input type="hidden" name="imagen" value="../images/productos/<?php echo $row['imagen'] ?>"><br>
                    <input type="hidden" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?>"><br>
                    <input type="hidden" name="precio" value="<?php echo $row['precio'] ?>"><br>
                    <input type="hidden" name="accion" value="registroDatos">

                    <div class="icons">
                        <?php
                            if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == "1") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';

                            } else if(isset($_SESSION['usuario']) && $_SESSION['id_rol'] == "2") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';
                            } else {
                                echo '';
                            }
                        ?>
                    </div>

                    <div class="content">
                        <img src="../images/productos/<?php echo $row['imagen'] ?>" alt="">
                        <h3><?php echo $row['nombre_producto'] ?></h3>
                        <div class="price"><?php echo $row['precio'] ?> <span>$90</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </form>
            <?php
                } 
            ?>
            </div>
        </section>
        
        <section class="product" id="shakers">
            <h1 class="heading">Nuestros <span>Shakers</span></h1>
            <div class="box-container" id="mostrar-producto-tienda-shakers">
            <?php
            include("../php/conexionBD.php");
            $query="SELECT * FROM productos WHERE seccion='shakers'"; 
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
            ?>
                <form class="box" action="../php/carrito.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"><br>
                    <input type="hidden" name="imagen" value="../images/productos/<?php echo $row['imagen'] ?>"><br>
                    <input type="hidden" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?>"><br>
                    <input type="hidden" name="precio" value="<?php echo $row['precio'] ?>"><br>
                    <input type="hidden" name="accion" value="registroDatos">

                    <div class="icons">
                        <?php
                            if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == "1") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';

                            } else if(isset($_SESSION['usuario']) && $_SESSION['id_rol'] == "2") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';
                            } else {
                                echo '';
                            }
                        ?>
                    </div>

                    <div class="content">
                        <img src="../images/productos/<?php echo $row['imagen'] ?>" alt="">
                        <h3><?php echo $row['nombre_producto'] ?></h3>
                        <div class="price"><?php echo $row['precio'] ?> <span>$90</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </form>
            <?php
                } 
            ?>
            </div>
        </section>
        
        <section class="product" id="barritas">
            <h1 class="heading">Barritas <span>energéticas</span></h1>
            <div class="box-container" id="mostrar-producto-tienda-barritas">
            <?php
            include("../php/conexionBD.php");
            $query="SELECT * FROM productos WHERE seccion='barritas'"; 
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
            ?>
                <form class="box" action="../php/carrito.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"><br>
                    <input type="hidden" name="imagen" value="../images/productos/<?php echo $row['imagen'] ?>"><br>
                    <input type="hidden" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?>"><br>
                    <input type="hidden" name="precio" value="<?php echo $row['precio'] ?>"><br>
                    <input type="hidden" name="accion" value="registroDatos">

                    <div class="icons">
                        <?php
                            if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == "1") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';

                            } else if(isset($_SESSION['usuario']) && $_SESSION['id_rol'] == "2") {
                                echo '<a id="heart" href="#" class="heart fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="cart fa fa-shopping-cart"></button>';
                            } else {
                                echo '';
                            }
                        ?>
                    </div>

                    <div class="content">
                        <img src="../images/productos/<?php echo $row['imagen'] ?>" alt="">
                        <h3><?php echo $row['nombre_producto'] ?></h3>
                        <div class="price"><?php echo $row['precio'] ?> <span>$90</span></div>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </form>
            <?php
                } 
            ?>
            </div>
        </section>

        <section class="product" id="sectionLoadMore">
                <h5 id="botonMas"><a id="loadMore"><i class="fa-solid fa-arrow-down"></i> Cargar mas <i class="fa-solid fa-arrow-down"></i></a></h5>
        </section>

        <section >
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
                            <h1 class="footer-heading footer-heading-white" id="contactanos" style="color: black;font-weight: bold;font-size:20px;background-color: #fff0;border-radius: 50px;text-align: center;">Contactanos</h1>
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
                                    <button type="submit" class="form-control btn submit px-3">Enviar</button>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            </footer>
        </section>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/main-boton.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>

