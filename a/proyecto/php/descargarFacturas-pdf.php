<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    ob_start();
    //Soluciona el error de headers already sent
    use Dompdf\Dompdf;

    if ($connection) {

    $query = "SELECT * from facturas";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'id_usuario' => $row['id_usuario'],
            'id_producto' => $row['id_producto'],
            'producto' => $row['producto'],
            'precio' => $row['precio']
        );
        }
            $jsonstring = json_encode($json);
            mysqli_close($connection);
            
?>
    <h3 style="margin-left: 0%;">FACTURAS</h3><hr>
    <table>
        <tr>
            <th style="border: 1px solid black;background-color:teal;">Id</th>
            <th style="border: 1px solid black;background-color:teal;">Id Usuario</th>
            <th style="border: 1px solid black;background-color:teal;">Id Producto</th>
            <th style="border: 1px solid black;background-color:teal;">Producto</th>
            <th style="border: 1px solid black;background-color:teal;">Precio</th>
        </tr>
        <tbody>
            <?php foreach($json as $factura) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $factura['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $factura['id_usuario'];?></td>
                    <td style="border: 1px solid black;"><?php echo $factura['id_producto'];?></td>
                    <td style="border: 1px solid black;"><?php echo $factura['producto'];?></td>
                    <td style="border: 1px solid black;"><?php echo $factura['precio']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php
    require("../pdf-excel/dompdf/autoload.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->loadHtml(ob_get_clean());
    $dompdf->render();
    $pdf=$dompdf->output();
    $filename = 'Facturas.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>