<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    session_start();

    if ($connection) {

        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            $id_usuario = $_SESSION['id'];
            $query = "DELETE FROM favoritos WHERE id = '$id' and id_usuario='$id_usuario'"; 
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die('Consulta fallida.');
            }
            //echo "Producto eliminado correctamente"; 
            mysqli_close($connection);
            header("Location: verFavoritos.php");
        }

    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>