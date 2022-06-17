<?php
    include('conexionBD.php');

    /*header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=Usuarios.xls');*/

    $nombre_archivo = "Ejercicios.xls";

    header("Content-type: application/vnd.ms-excel");//Especificamos la extension que queremos descargar
    header("Content-Disposition: attachment; filename=$nombre_archivo" );//Especificamos el nombre del archivo cuando se descarge
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Pragma: public");

    $query = "SELECT * from ejercicios";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'urlP' => $row['urlP'],
            'imagen' => $row['imagen'],
            'titulo' => $row['titulo']     
        );
        }
            $jsonstring = json_encode($json);
            mysqli_close($connection);
?>

    <table class="table table-striped table-bordered"><!--Construimos la tabla que queramos que se vea en el descargable-->
        <tr>
            <th style="border: 1px solid black;background-color:teal;">Id</th>
            <th style="border: 1px solid black;background-color:teal;">Url</th>
            <th style="border: 1px solid black;background-color:teal;">Imagen</th>
            <th style="border: 1px solid black;background-color:teal;">Titulo</th>
        </tr>
        <tbody style="border: 1px solid black;">
            <?php foreach($json as $ejercicio) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['urlP'];?></td>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['imagen'];?></td>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['titulo'];?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>