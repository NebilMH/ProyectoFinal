<?php
    error_reporting(0);
    ini_set('display_errors', '1');

    session_start();

    if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == "1") {
        $usuario = $_SESSION['usuario'];
        $id_rol = $_SESSION['id_rol'];
    } else {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estilos-admin.css">
    <script src="https://kit.fontawesome.com/9ba7b80b84.js" crossorigin="anonymous"></script>

    <!-- Estilos -->
    <link rel="stylesheet" href="../css/responsive-principal.css">

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
        Administración - Roles
    </div>

    <header>
        <div class="header">
            <div id="menu-bar" class="fa fa-bars"></div>
                <!--<a href="#" class="logo" style="font-weight: bold;"><img src="images/logo2.png" alt="">  -->
                <a href="#" class="logo" style="font-weight: bold;font-size:20px;text-transform: uppercase;"><i class="fa-solid fa-dumbbell"></i> Gym Contigo</a>
            <nav class="navbar" style="text-transform: uppercase;font-weight:bold">
                <a href="admin-usuarios.php">Usuarios</a>
                <a href="admin-productos.php">Peroductos</a>
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
                <form action='php/perfil-usuario.php' method='POST' name='formulario'>
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
                <form id="formulario" class="formulario" method="post" action="añadirRoles-admin.php">
                    <p class="panel0" style="font-weight: bold">Panel de creacion</p>
                    <ul style="background-color: white;" id="seccion_crear-usuario">
                        <div>Rol: <input id="create_rol" name="Crol" type="text"></div><br>
                        <button type="submit" class="editUser">Crear Rol</button>
                    </ul>
                </form>
                <form id="formularioU" class="formularioU" method="post" action="editarRoles.php">
                    <p class="panel0" style="font-weight: bold;">Panel de edición</p>
                    <ul style="background-color: white;" id="seccion_crear-usuario">
                        <div><input id="inputId" name="id" type="hidden"></div>
                        <div>Rol: <input id="update_rol" name="Erol" type="text"></div><br>
                        <button type="submit" class="editUser">Actualizar Rol</button>
                    </ul>
                </form>
            </div><hr>
            <section class="usuarios_" style="height:45rem;overflow-y:scroll;">
                <table class="tabla-usuarios" >
                    <thead>
                        <tr class="topTable">
                            <td style="background-color: #3cc0b5;"><b>Id</b></td>
                            <td style="background-color: #3cc0b5;"><b>Rol</b></td>

                            <input type="checkbox" id="btn-modal">
                            <td><label for="btn-modal" class="lbl-modal" id="lupa" style="color:darkblue;"><i class="fa-solid fa-magnifying-glass"></i></label></td>
                            <button id="limpiarResult2">Limpiar resultados <i class="fa-solid fa-broom"></i></button>
                            <div id="ponerBoton"></div>
                            <div class="modal" id="buscarResult">
                                <div class="contenedor">
                                    <label for="btn-modal" id="label">X</label>
                                    <div class="contenido">
                                            <input name="buscar" id="buscarR" type="search" placeholder="¿Que estas buscando?" aria-label="Buscar">						 
                                        <div id="resultado">
                                            <div>
                                                <ul id="contenedor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span style="float:right;cursor: pointer;font-size: 30px; margin-right: 10px;" ONCLICK="window.location.href= 'descargarRoles-pdf.php'"><i class="fa-solid fa-file-pdf"></i></span>	
                        </tr>
                    </thead>
                    <tbody id="mostrar-rol"></tbody>
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