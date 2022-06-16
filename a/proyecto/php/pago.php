<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {

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
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>