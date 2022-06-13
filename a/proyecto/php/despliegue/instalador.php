<?php
    $BBDD = $_POST['bd'];
    $USERDB = $_POST['usuario'];
    $PASSDB = $_POST['contrasenia'];

    $BBDD = escapeshellarg($BBDD);
    $USERDB = escapeshellarg($USERDB);
    $PASSDB = escapeshellarg($PASSDB);

    $output = exec("instalador.sh $BBDD $USERDB $PASSDB");

    try {
        shell_exec("/var/www/html/ProyectoFinal/a/proyecto/php/despliegue/instalador.sh");
        echo "<script type='text/javascript'>window.location.href = 'instalacion-correcta.php';</script>";
    } catch (\Throwable $th){
        throw $th;
    }
?>
