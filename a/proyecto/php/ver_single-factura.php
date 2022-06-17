<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {

    if(isset($_REQUEST['id'])) {
        $nombre = mysqli_real_escape_string($connection, $id = $_REQUEST['id']);

        $query = "SELECT * from facturas WHERE id = '$id'";

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
        
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    mysqli_close($connection);
    }
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>