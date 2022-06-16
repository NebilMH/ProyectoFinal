<?php
    include('conexionBD.php');

    /*header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=Usuarios.xls');*/

    $nombre_archivo = "Productos.xls";

    header("Content-type: application/vnd.ms-excel");//Especificamos la extension que queremos descargar
    header("Content-Disposition: attachment; filename=$nombre_archivo");//Especificamos el nombre del archivo cuando se descarge
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Pragma: public");

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

    <table class="table table-striped table-bordered"><!--Construimos la tabla que queramos que se vea en el descargable-->
        <tr>
            <th style="border: 1px solid black;background-color:teal;">Id</th>
            <th style="border: 1px solid black;background-color:teal;">Seccion</th>
            <th style="border: 1px solid black;background-color:teal;">Nombre</th>
            <th style="border: 1px solid black;background-color:teal;">descripcion</th>
            <th style="border: 1px solid black;background-color:teal;">precio</th>
            <th style="border: 1px solid black;background-color:teal;">imagen</th>
        </tr>
        <tbody style="border: 1px solid black;">
            <?php foreach($json as $producto) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $producto ['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto ['seccion'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto ['nombre_producto'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto ['descripcion'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto ['precio'];?></td>
                    <td style="border: 1px solid black;"><?php echo $producto ['imagen'];?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>