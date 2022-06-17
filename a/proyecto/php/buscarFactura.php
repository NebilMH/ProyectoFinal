<?php
    include("conexionBD.php");
		
	error_reporting(0);
    ini_set('display_errors', '1');
    
    if ($connection) {

    $buscar = $_POST['buscar'];

    $query = "SELECT * from facturas WHERE producto LIKE '$buscar%'";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }

    $json = array();
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