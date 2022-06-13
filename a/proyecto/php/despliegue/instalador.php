<?php
    $bd = $_POST['bd'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    putenv("BBDD=$bd");
    putenv("USERDB=$usuario");
    putenv("PASSDB=$contrasenia");

    $output = exec('instalador.sh');

    try {
        shell_exec("/var/www/html/ProyectoFinal/a/proyecto/php/despliegue/instalador.sh");
        echo "<script type='text/javascript'>window.location.href = 'instalacion-correcta.php';</script>";
    } catch (\Throwable $th){
        throw $th;
    }
?>
