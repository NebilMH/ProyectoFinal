<?php
    include('conexionBD.php');

    $buscar = $_POST['buscar'];

    $query = "SELECT * from roles WHERE rol LIKE '$buscar%'";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'rol' => $row['rol']  
        );
    }
            $jsonstring = json_encode($json);
            echo $jsonstring;
            mysqli_close($connection);
?>