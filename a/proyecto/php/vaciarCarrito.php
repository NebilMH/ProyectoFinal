<?php 
    session_start();
    unset($_SESSION['datos']);//Le especificamos la sesion que queremos que cierre para no cerrar todas

    echo "<script type='text/javascript'>window.location.href = 'carrito.php';</script>";
?>