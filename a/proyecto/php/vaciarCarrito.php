<?php 
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {
		
    session_start();
    unset($_SESSION['datos']);//Le especificamos la sesion que queremos que cierre para no cerrar todas

    echo "<script type='text/javascript'>window.location.href = 'carrito.php';</script>";
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>