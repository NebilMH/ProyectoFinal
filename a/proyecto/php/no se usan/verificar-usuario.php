<?php 
    include('conexionBD.php');

    if ((isset($_SESSION['usuario'])) && ($_SESSION['usuario'] != "")) {
        echo "Bienvenido/a ". $_SESSION['usuario'];
    } else {
        echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
    }
?>