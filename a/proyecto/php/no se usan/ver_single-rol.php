<?php
    include('conexionBD.php');

    if(isset($_REQUEST['id'])) {
        $nombre = mysqli_real_escape_string($connection, $id = $_REQUEST['id']);

        $query = "SELECT * from roles WHERE id = '$id'";

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
            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
            mysqli_close($connection);
    }
?>