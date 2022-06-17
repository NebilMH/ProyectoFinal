<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    use Dompdf\Dompdf;

    if ($connection) {

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
    <h3 style="margin-left: 0%;">SOPORTE</h3><hr>
    <table class="table table-striped table-bordered">
        <tr>
            <th style="border: 1px solid black;background-color:teal;font-family:Georgia, 'Times New Roman', Times, serif;">Id</th>
            <th style="border: 1px solid black;background-color:teal;font-family:Georgia, 'Times New Roman', Times, serif;">Nombre</th>
            <th style="border: 1px solid black;background-color:teal;font-family:Georgia, 'Times New Roman', Times, serif;">Email</th>
            <th style="border: 1px solid black;background-color:teal;font-family:Georgia, 'Times New Roman', Times, serif;">Asunto</th>
            <th style="border: 1px solid black;background-color:teal;font-family:Georgia, 'Times New Roman', Times, serif;">Mensaje</th>
        </tr>
        <tbody>
            <?php foreach($json as $mensaje) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $mensaje['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $mensaje['nombre'];?></td>
                    <td style="border: 1px solid black;"><?php echo $mensaje['email'];?></td>
                    <td style="border: 1px solid black;"><?php echo $mensaje['asunto'];?></td>
                    <td style="border: 1px solid black;"><?php echo $mensaje['mensaje'];?></td>
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
    $filename = 'Soporte.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>   
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>