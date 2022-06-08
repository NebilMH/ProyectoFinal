<?php
    include("conexionBD.php");
    ob_start(); //Soluciona el error de headers already sent
    use Dompdf\Dompdf;

    $query = "SELECT * from usuarios";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'id_rol' => $row['id_rol'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],     
            'email' => $row['email'],
            'usuario' => $row['usuario'],
            'contraseña' => $row['contraseña'],
        );
        }
            $jsonstring = json_encode($json);
            mysqli_close($connection);
?>
    <h3 style="margin-left: 0%;">USUARIOS</h3><hr>
    <table class="table table-striped table-bordered"><!--Construimos la tabla que queramos que se vea en el descargable-->
        <tr>
            <th style="border: 1px solid black;background-color:teal;">Id</th>
            <th style="border: 1px solid black;background-color:teal;">Id_Rol</th>
            <th style="border: 1px solid black;background-color:teal;">Nombre</th>
            <th style="border: 1px solid black;background-color:teal;">Apellido</th>
            <th style="border: 1px solid black;background-color:teal;">Email</th>
            <th style="border: 1px solid black;background-color:teal;">Usuario</th>
        </tr>
        <tbody>
            <?php foreach($json as $usuario) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $usuario['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $usuario['id_rol'];?></td>
                    <td style="border: 1px solid black;"><?php echo $usuario['nombre'];?></td>
                    <td style="border: 1px solid black;"><?php echo $usuario['apellido'];?></td>
                    <td style="border: 1px solid black;"><?php echo $usuario['email'];?></td>
                    <td style="border: 1px solid black;"><?php echo $usuario['usuario'];?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php
    require("../pdf-excel/dompdf/autoload.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->loadHtml(ob_get_clean());
    $dompdf->render();
    $pdf = $dompdf->output();
    $filename = 'Usuarios.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>    



















































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