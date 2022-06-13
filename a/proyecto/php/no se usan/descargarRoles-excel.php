<?php
    include('conexionBD.php');

    /*header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=Usuarios.xls');*/

    $nombre_archivo = "Soporte.xls";

    header("Content-type: application/vnd.ms-excel");//Especificamos la extension que queremos descargar
    header("Content-Disposition: attachment; filename=$nombre_archivo" );//Especificamos el nombre del archivo cuando se descarge
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Pragma: public");

    $query = "SELECT * from soporte";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'email' => $row['email'],
            'asunto' => $row['asunto'],     
            'mensaje' => $row['mensaje'] 
        );
        }
            $jsonstring = json_encode($json);
            mysqli_close($connection);
?>

    <table class="table table-striped table-bordered"><!--Construimos la tabla que queramos que se vea en el descargable-->
        <tr>
            <th style="border: 1px solid black;background-color:teal;">Id</th>
            <th style="border: 1px solid black;background-color:teal;">Nombre</th>
            <th style="border: 1px solid black;background-color:teal;">Email</th>
            <th style="border: 1px solid black;background-color:teal;">Asunto</th>
            <th style="border: 1px solid black;background-color:teal;">Mensaje</th>
        </tr>
        <tbody style="border: 1px solid black;">
            <?php foreach($json as $mensaje) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $mensaje ['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $mensaje ['nombre'];?></td>
                    <td style="border: 1px solid black;"><?php echo $mensaje ['email'];?></td>
                    <td style="border: 1px solid black;"><?php echo $mensaje ['asunto'];?></td>
                    <td style="border: 1px solid black;"><?php echo $mensaje ['mensaje'];?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>