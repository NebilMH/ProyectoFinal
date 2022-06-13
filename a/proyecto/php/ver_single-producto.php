<?php
    include('conexionBD.php');

    if(isset($_REQUEST['id'])) {
        $nombre = mysqli_real_escape_string($connection, $id = $_REQUEST['id']);

        $query = "SELECT * from productos WHERE id = '$id'";

        $result = mysqli_query($connection, $query);
        if(!$result) {
            die('Query Failed'. mysqli_error($connection));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'seccion' => $row['seccion'],
            'nombre_producto' => $row['nombre_producto'],
            'descripcion' => $row['descripcion'],
            'precio' => $row['precio'],
            'imagen' => $row['imagen'] 
        );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
        mysqli_close($connection);
    }
?>