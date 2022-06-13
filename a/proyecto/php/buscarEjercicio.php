<?php
    include('conexionBD.php');

    $buscar = $_POST['buscar'];

    $query = "SELECT * from ejercicios WHERE titulo LIKE '$buscar%'";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'urlP' => $row['urlP'],
            'imagen' => $row['imagen'],
            'titulo' => $row['titulo']   
        );
    }
            $jsonstring = json_encode($json);
            echo $jsonstring;
            mysqli_close($connection);
?>