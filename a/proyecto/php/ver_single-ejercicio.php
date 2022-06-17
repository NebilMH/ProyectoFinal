<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {

    if(isset($_REQUEST['id'])) {
        $nombre = mysqli_real_escape_string($connection, $id = $_REQUEST['id']);

        $query = "SELECT * from ejercicios WHERE id = '$id'";

        $result = mysqli_query($connection, $query);
        if(!$result) {
            die('Query Failed'. mysqli_error($connection));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'urlP' => $row['urlP'],
            'urlV' => $row['urlV'],
            'imagen' => $row['imagen'],
            'titulo' => $row['titulo'],
            'descripcion' => $row['descripcion']
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