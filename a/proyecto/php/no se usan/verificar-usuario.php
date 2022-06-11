<?php 
    include('conexionBD.php');

    if ((isset($_SESSION['usuario'])) && ($_SESSION['usuario'] != "")) {
        echo "Bienvenido/a ". $_SESSION['usuario'];
    } else {
        header("refresh:0;url=login.php");
    }
?>