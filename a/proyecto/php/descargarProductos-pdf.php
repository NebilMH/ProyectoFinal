<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    ob_start(); //Soluciona el error de headers already sent
    use Dompdf\Dompdf;

    if ($connection) {

    $query = "SELECT * from productos";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'seccion' => $row['seccion'],
            'nombre_producto' => $row['nombre_producto'],
            'descripcion' => $row['descripcion'],
            'precio' => $row['precio'],
            'imagen' => $row['imagen']
        );
        }
            $jsonstring = json_encode($json);
            mysqli_close($connection);
            
?>
    <h3 style="margin-left: 0%;">PRODUCTOS</h3><hr>
    <table>
        <tr>
            <th style="border: 1px solid black;background-color:teal;">Id</th>
            <th style="border: 1px solid black;background-color:teal;">Seccion</th>
            <th style="border: 1px solid black;background-color:teal;">Producto</th>
            <th style="border: 1px solid black;background-color:teal;">Descripcion</th>
            <th style="border: 1px solid black;background-color:teal;">Precio</th>
            <th style="border: 1px solid black;background-color:teal;">Imagen</th>
            
        </tr>
        <tbody>
            <?php foreach($json as $producto) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $producto['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto['seccion'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto['nombre_producto'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto['descripcion'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto['precio']; ?></td>
                    <td style="border: 1px solid black;"><?php echo $producto['imagen'];?></td>
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
    $filename = 'Productos.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>