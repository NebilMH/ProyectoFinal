<?php
    error_reporting(0);
    ini_set('display_errors', '1');

    session_start();

    if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == "1") {
        $usuario = $_SESSION['usuario'];
        $id_rol = $_SESSION['id_rol'];
    } else {
        echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title>Nabil Messaoudi Hammu</title>-->
    <title>Gym Contigo</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon3.png">
    <link rel="stylesheet" href="../css/estilos-admin.css">
    <script src="https://kit.fontawesome.com/9ba7b80b84.js" crossorigin="anonymous"></script>

    <!-- Estilos boton modo oscuro -->
    <script src="https://kit.fontawesome.com/9ba7b80b84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos-boton-ppal.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        #buscarResult {width:100%;float:right;position: absolute;background-color: #000000c7;border: 2px solid black;padding-top:17px;margin: auto;}
        #contenrdor, #contenedorP {margin-left: 10px;margin-right: 10px;}
    </style>
</head>
<body>
    <div class="bocadillo">
        Administración - Usuarios
    </div>

    <header>
        <div class="header">
            <div id="menu-bar" class="fa fa-bars"></div>
                <!--<a href="#" class="logo" style="font-weight: bold;"><img src="images/logo2.png" alt="">  -->
                <a href="#" class="logo" style="font-weight: bold;font-size:20px;text-transform: uppercase;"><i class="fa-solid fa-dumbbell"></i> Gym Contigo</a>
            <nav class="navbar" style="text-transform: uppercase;font-weight:bold">
                <a href="admin-productos.php">Productos</a>
                <a href="admin-ejercicios.php">Ejercicios</a>
                <a href="admin-soporte.php">Soporte</a>
                <a href="../index.php">Inicio</a>
                <a href="../shop/index.php">Tienda</a>
                <a class="botondm">
                    <input type="checkbox" id="switch-checkbox"/>
                    <label id="switch" style="font-weight: bold;" class="switchtxt" for="switch-checkbox">Modo Oscuro</label>
                </a>
            </nav>
            <h1>
                <!--<a href="#"><i ONCLICK="window.location.href= 'login.html'" class="fa fa-user"></i> <?php /*if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario'];}*/?></a>-->
                <form action='php/perfil-usuario-ppal.php' method='POST' name='formulario'>
                <?php 
                        if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "Admin") { //Si la sesion es de administrador, al hacer click en el nombre de usuario nos llevara a la pagina de administrador, tambien aparece el boron de cerrar sesion
                            echo "
                                <a href='#' style='font-size:20px;background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                <a aria-label='cerrarS button' style='font-size:20px;margin-left:10px;' href='cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>
                            ";
                        } else if (isset($_SESSION['invitado'])) { //Si la sesion es de invitado, se ocultaran botones, como carrito, favoritos y cerrar sesion, y solo se muestra el de iniciar sesion
                            echo "<a href='login.php'><i class='fa fa-user'></i></a>";
                        } else { //Si la sesion no es ni de administrador ni de invitado, es de usuario, por lo que al pulsar en su usuario lo llevara a una pagina para editar sus datos, tambien aparece el boron de cerrar sesion
                                //Al perfil del usuario le pasamos la id para que pueda hacer la consulta a la base de datos mas facil
                            echo "
                                <input type='hidden' name='id' value='".$_SESSION['id']."'>
                                <button type='submit' style='background-color:transparent'>
                                    <a style='font-size:20px;background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                                </button>
                                <a aria-label='cerrarS button' style='font-size:20px;' href='cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>
                            ";
                        } 
                ?>
                </form>
            </h1>
        </div>
    </header>

    <div class="tablas">
        <!--<label class="userAdmin">Sesion actual: <a style="font-weight:bold;color:red;font-size:20px;font-family:Georgia, 'Times New Roman', Times, serif;'"><?php //echo $_SESSION['usuario']?></a><button onclick="location.href='../index.php'" class="userAdminBtn">Inicio</button><button onclick="location.href='shop/index.php'">Tienda</button></label>-->      
        <div class="usuarios">
            <div class="formulario_U">
                <form id="formulario" class="formulario" method="post" action="aniadirUsuarios-admin.php">
                    <p class="panel0" style="font-weight: bold">Panel de creacion</p>
                    <ul style="background-color: white;" id="seccion_crear-usuario">
                        <div>Id Rol: <input id="create_id_rol" name="Cid_rol" type="text"></div>
                        <div>Nombre: <input id="create_nombre" name="Cnombre" type="text"></div>
                        <div>Apellido: <input id="create_apellido" name="Capellido" type="text"/></div>
                        <div>Email: <input id="create_email" name="Cemail" type="text" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$"/></div>
                        <div>Usuario: <input id="create_usuario" name="Cusuario" type="text"></div>
                        <div>Contraseña: <input id="create_contrasenia" name="Ccontrasenia" type="text"></div><br>
                        <button type="submit" class="editUser">Crear Usuario</button>
                    </ul>
                </form>
                <form id="formularioU" class="formularioU" method="post" action="editarUsuarios.php">
                    <p class="panel0" style="font-weight: bold;">Panel de edición</p>
                    <ul style="background-color: white;" id="seccion_crear-usuario">
                        <div><input id="inputId" name="id" type="hidden"></div>
                        <div>Id Rol: <input id="update_id_rol" name="Eid_rol" type="text"></div>
                        <div>Nombre: <input id="update_nombre" name="Enombre" type="text"></div>
                        <div>Apellido: <input id="update_apellido" name="Eapellido" type="text"/></div>
                        <div>Email: <input id="update_email" name="Eemail" type="text" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$"/></div>
                        <div>Usuario: <input id="update_usuario" name="Eusuario" type="text"></div>
                        <div>Contraseña: <input id="update_contrasenia" name="Econtrasenia" type="text"></div><br>
                        <button type="submit" class="editUser">Actualizar Usuario</button>
                    </ul>
                </form>
            </div><hr>
            <section class="usuarios_" style="height:45rem;overflow-y:scroll;">
                <table class="tabla-usuarios" >
                    <thead>
                        <tr class="topTable">
                            <td style="background-color: #3cc0b5;"><b>Id</b></td>
                            <td style="background-color: #3cc0b5;"><b>Id Rol</b></td>
                            <td style="background-color: #3cc0b5;"><b>Nombre</b></td>
                            <td style="background-color: #3cc0b5;"><b>Apellido</b></td>
                            <td style="background-color: #3cc0b5;" id="idEmail"><b>Email</b></td>
                            <td style="background-color: #3cc0b5;"><b>Usuario</b></td>
                            <td style="background-color: #3cc0b5;" id="idPass"><b>Contraseña</b></td>

                            <input type="checkbox" class="quitar" id="btn-modal">
                            <td><label for="btn-modal" class="lbl-modal" id="lupa" style="color:darkblue;"><i class="fa-solid fa-magnifying-glass"></i></label></td>
                            <button id="limpiarResult2">Limpiar resultados <i class="fa-solid fa-broom"></i></button>
                            <div id="ponerBoton"></div>
                            <div class="modal" id="buscarResult">
                                <div class="contenedor">
                                    <label for="btn-modal" id="label">X</label>
                                    <div class="contenido">
                                            <input name="buscar" id="buscarU" type="search" placeholder="¿Que estas buscando?" aria-label="Buscar">						 
                                        <div id="resultado">
                                            <div>
                                                <ul id="contenedor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span style="float:right;cursor: pointer;font-size: 30px; margin-right: 10px;" ONCLICK="window.location.href= 'descargarUsuarios-pdf.php'"><i class="fa-solid fa-file-pdf"></i></span>	
                        </tr>
                    </thead>
                    <tbody id="mostrar-usuarios"></tbody>
                </table>
            </section>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../js/admin.js"></script>
    
    <script src="../js/main.js"></script>
    <script src="../js/main-boton.js"></script>
    <script src="../shop/js/index.js"></script>
</body>
</html>