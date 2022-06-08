<?php
    try {
        shell_exec("/var/www/html/ProyectoFinal/proyecto/php/despliegue/instalador.sh");
        echo "<script type='text/javascript'>
                window.location.href = 'instalacion-correcta.php';
            </script>";
    } catch (\Throwable $th){
        throw $th;
    }
?>