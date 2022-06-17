<?php
    include("conexionBD.php");

    error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {

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
    <script>
        function show() {
            alert("No hay datos para imprimir");
        }
    </script>
    <style>
        #buscarResult {width:100%;float:right;position: absolute;background-color: #000000c7;border: 2px solid black;padding-top:17px;margin: auto;}
        #contenrdor, #contenedorP {margin-left: 10px;margin-right: 10px;}
    </style>
</head>
<body>
    <div class="bocadillo">
        Administración - Soporte
    </div>

    <header>
        <div class="header">
            <div id="menu-bar" class="fa fa-bars"></div>
                <!--<a href="#" class="logo" style="font-weight: bold;"><img src="images/logo2.png" alt="">  -->
                <a href="#" class="logo" style="font-weight: bold;text-transform: uppercase;"><i class="fa-solid fa-dumbbell"></i> Gym Contigo</a>
            <nav class="navbar" style="text-transform: uppercase;font-weight:bold">
                <a href="admin-usuarios.php">Usuarios</a>
                <a href="admin-productos.php">Productos</a>
                <a href="admin-ejercicios.php">Ejercicios</a>
                <a href="admin-facturas.php">Facturas</a>
                <a href="../index.php">Inicio</a>
                <a href="../shop/index.php">Tienda</a>
                <a class="botondm">
                    <input type="checkbox" id="switch-checkbox"/>
                    <label id="switch" style="font-weight: bold;" class="switchtxt" for="switch-checkbox">Modo Oscuro</label>
                </a>
            </nav>
            <h1>
                <!--<a href="#"><i ONCLICK="window.location.href= 'login.html'" class="fa fa-user"></i> <?php /*if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario'];}*/?></a>-->
                <?php 
                    echo "<a id='userPage' href='#' style='font-size:20px;background-color:transparent;color:darkcyan;font-weight:bold;text-trnsform:none;font-family:Georgia, 'Times New Roman', Times, serif;'><i class='usuario fa fa-user'></i> ".$_SESSION['usuario']."</a>
                    <a aria-label='cerrarS button' style='font-size:20px;margin-left:10px;' href='cerrar-sesion.php'><i style='color:red;' class='closeS fa fa-sign-out' aria-hidden='true'></i></a>";
                ?>
            </h1>
        </div>
    </header>

    <div class="tablas">
        <!--<label class="userAdmin">Sesion actual: <a style="font-weight:bold;color:red;font-size:20px;font-family:Georgia, 'Times New Roman', Times, serif;'"><?php //echo $_SESSION['usuario']?></a><button onclick="location.href='../index.php'" class="userAdminBtn">Inicio</button><button onclick="location.href='shop/index.php'">Tienda</button></label>-->
        <div class="soporte">
            <div class="formulario_U">
                <form id="formulario" class="formulario" method="post" action="aniadirSoporte-admin.php">
                    <p class="panel0" style="font-weight: bold">Panel de creacion</p>
                    <ul style="background-color: white;" id="seccion_crear-usuario">
                        <div>Nombre: <input id="create_nombre" name="CnombreS" type="text"></div>
                        <div>Email: <input id="create_nombre" name="CemailS" type="text" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$"/></div>
                        <div>Asunto: <input id="create_nombre" name="CasuntoS" type="text"/></div>
                        <div>Mensaje: <input id="create_nombre" name="CmensajeS" type="text" maxlength="100"/></div><br>
                        <button type="submit" class="editUser">Crear Soporte</button>
                    </ul>
                </form>
                <form id="formularioU" class="formularioU" method="post" action="editarSoporte.php">
                    <p class="panel0" style="font-weight: bold;">Panel de edición</p>
                    <ul style="background-color: white;" id="seccion_crear-usuario">
                        <div><input id="inputId" name="id" type="hidden"></div>
                        <div>Nombre: <input id="update_nombreS" name="EnombreS" type="text"></div>
                        <div>Email: <input id="update_emailS" name="EemailS" type="text" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$"/></div>
                        <div>Asunto: <input id="update_asuntoS" name="EasuntoS" type="text"/></div>
                        <div>Mensaje: <input id="update_mensajeS" name="EmensajeS" type="text" maxlength="100"/></div><br>
                        <button type="submit" class="editUser">Actualizar Soporte</button>
                    </ul>
                </form>
            </div><hr>
            <section class="soporte_" style="max-height:77rem;overflow-y:scroll;">
                <table class="tabla-soporte">
                    <thead>
                        <tr class="topTable">
                            <td style="background-color: #3cc0b5"><b>Id</b></td>
                            <td style="background-color: #3cc0b5;"><b>Nombre</b></td>
                            <td style="background-color: #3cc0b5;" id="idEmailS"><b>Email</b></td>
                            <td style="background-color: #3cc0b5;" id="idAsunto"><b>Asunto</b></td>	
                            <td style="background-color: #3cc0b5;"><b>Mensaje</b></td>

                            <input type="checkbox" id="btn-modal">
                            <td><label for="btn-modal" class="lbl-modal" id="lupa" style="color:darkblue;"><i class="fa-solid fa-magnifying-glass"></i></label></td>
                            <button id="limpiarResult2">Limpiar resultados <i class="fa-solid fa-broom"></i></button>
                            <div id="ponerBoton"></div>
                            <div class="modal" id="buscarResult">
                                <div class="contenedor">
                                    <label for="btn-modal" id="label">X</label>
                                    <div class="contenido">
                                            <input name="buscar" id="buscarS" type="search" placeholder="¿Que estas buscando?" aria-label="Buscar">						 
                                        <div id="resultado">
                                            <div>
                                                <ul id="contenedor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                include("conexionBD.php");
                                $query = "SELECT * FROM soporte";
                                $result = mysqli_query($connection, $query);

                                    if (mysqli_fetch_row($result) > 0) {
                                ?> 
                                    <span style="float: right;cursor: pointer;font-size: 30px; margin-right: 10px;" ONCLICK="window.location.href= 'descargarSoporte-pdf.php'"><i class="fa-solid fa-file-pdf"></i></span>
                                <?php
                                    } else {
                                ?> 
                                    <span style="float: right;cursor: pointer;font-size: 30px; margin-right: 10px;" onclick="show()"><i class="fa-solid fa-file-pdf"></i></span>	
                                <?php
                                    }
                            ?>
                        </tr>
                    </thead>
                    <tbody id="mostrar-soporte"></tbody>
                </table>
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../js/admin.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/main-boton.js"></script>
    <script src="../shop/js/index.js"></script>
</body>
</html>

<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>