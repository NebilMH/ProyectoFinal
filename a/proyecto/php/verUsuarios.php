<?php
    include('conexionBD.php');//Incluimos el archivo de conexion para no tener que poner los datos en cada fichero

    $query = "SELECT * from usuarios";

    $result = mysqli_query($connection, $query);//Ejecutamos la conexion y la consulta

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));//En caso de fallar la consulta mostramos error
    }

    $json = array();//Obtenemos los productos de la base de datos y los almacenamos en formato json
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'id_rol' => $row['id_rol'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'email' => $row['email'],
            'usuario' => $row['usuario'],
            'contraseña' => $row['contraseña']      
        );
        }
            $jsonstring = json_encode($json);
            echo $jsonstring;
            mysqli_close($connection);
?>