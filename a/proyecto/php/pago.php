<?php
    include("../php/conexionBD.php");
    session_start();

    $array = $_SESSION['datos'];

    for ($i=0; $i < sizeof($_SESSION['datos']); $i++) {
        $id_usuario = $_SESSION['id'];
        $id_producto = $_SESSION['datos'][$i]['id'];
        $producto = $_SESSION['datos'][$i]['nombre_producto'];
        $precio = $_SESSION['datos'][$i]['precio'];

        $query = "INSERT INTO facturas (id_usuario, id_producto, producto, precio) 
        VALUES ('$id_usuario', '$id_producto', '$producto', '$precio')";
        $result = mysqli_query($connection, $query);
    }
?>