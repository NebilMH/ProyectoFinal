<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {

    $query = "SELECT * from facturas";

    $result = mysqli_query($connection, $query);//Ejecutamos la conexion y la consulta

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));//En caso de fallar la consulta mostramos error
    }

    $json = array();//Obtenemos los productos de la base de datos y los almacenamos en formato json
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'id_usuario' => $row['id_usuario'],
            'id_producto' => $row['id_producto'],
            'producto' => $row['producto'],
            'precio' => $row['precio']     
        );
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($connection);
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>