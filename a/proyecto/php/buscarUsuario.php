<?php
    include('conexionBD.php');

    $buscar = $_POST['buscar'];

    $query = "SELECT * from usuarios WHERE nombre LIKE '$buscar%'";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'email' => $row['email'],
            'usuario' => $row['usuario'],
            'contrasenia' => $row['contrasenia']      
        );
    }
            $jsonstring = json_encode($json);
            echo $jsonstring;
            mysqli_close($connection);
?>